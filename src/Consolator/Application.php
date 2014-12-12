<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 13:52
 */

namespace AlexanderC\Consolator;


use AlexanderC\Consolator\Command\Implementation\HelpCommand;
use AlexanderC\Consolator\Command\Implementation\ListCommand;
use AlexanderC\Consolator\Command\Implementation\RunCommand;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Input\StdInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;
use AlexanderC\Consolator\Command\Output\StdOutput;
use AlexanderC\Consolator\Exception\ConfigurationException;
use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\CommandsCollection;

/**
 * Class Application
 * @package AlexanderC\Consolator
 */
class Application
{
    const COMMAND_REGEX = "/#\s*CSL\s*::\s*CMD\s*\(\s*(?P<commandClass>[^\)\s]+)\s*\)/ui";
    const HELP_OPTION = 'help';

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var CommandsCollection
     */
    protected $commands;

    /**
     * @var string
     */
    protected $mainScript;

    /**
     * @var array
     */
    protected $internalCommands = [
        HelpCommand::class,
        ListCommand::class,
        RunCommand::class
    ];

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->bootstrap();
    }

    /**
     * @return CommandsCollection
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return string
     */
    public function getMainScript()
    {
        return $this->mainScript;
    }

    /**
     * @param string $commandName
     * @return AbstractCommand
     */
    public function resolveCommand($commandName)
    {
        return $this->commands->resolve($commandName);
    }

    /**
     * @param AbstractCommand $command
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function runCommand(AbstractCommand $command, $input = null, $output = null)
    {
        $result = AbstractCommand::SUCCESS;

        try {
            if($input->has(self::HELP_OPTION, AbstractInput::LONG_OPTION)) {
                $output->write("/f[green]Help for '%s': /!f", [$command->getName()]);
                $output->writeln("/f[inverted+green]%s/!f", [$command->getHelp()]);
            } else {
                $result = $command->run($input, $output);
            }
        } catch(\Exception $e) {
            $result = AbstractCommand::ERROR;
            $output->writeln('/b[white]/f[red][%s] %s/!f', [get_class($e), $e->getMessage()]);
        }

        $output->flush();

        return $result;
    }

    /**
     * @param string $name
     * @return string
     */
    public function guessCommand($name)
    {
        return $this->commands->guess($name);
    }

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run($input = null, $output = null)
    {
        global $argv;

        $this->mainScript = array_shift($argv);
        $commandName = array_shift($argv) ? : HelpCommand::NAME;

        $input = is_object($input) && $input instanceof AbstractInput ? $input : new StdInput($argv);
        $output = is_object($output) && $output instanceof AbstractOutput ? $output : new StdOutput();

        $command = $this->resolveCommand($commandName);

        if(null === $command) {
            $guessedCommandName = $this->guessCommand($commandName);

            $output->writeln(
                '/b[white]/f[red]Did you mean /f[inverted]%s/!f/b[white]/f[red]?/!f',
                [$guessedCommandName]
            );

            return AbstractCommand::ERROR;
        }

        return $this->runCommand($command, $input, $output);
    }

    /**
     * @param int $code
     */
    public function terminate($code = AbstractCommand::SUCCESS)
    {
        exit($code);
    }

    /**
     * @return void
     */
    protected function bootstrap()
    {
        $autoloadMapping = $this->config->{Config::AUTOLOAD_MAPPING};
        $commandPaths = $this->config->{Config::COMMAND_PATHS};
        $commandPaths = is_array($commandPaths) ? $commandPaths : [$commandPaths];

        if(!is_array($autoloadMapping)) {
            require_once('./Exception/ConfigurationException.php');
            throw new ConfigurationException(
                "Autoload mapping should be an array that consists from class prefix" .
                " and the path where the classes are located"
            );
        }

        foreach($autoloadMapping as $classPrefix => $path) {
            $classPrefix = trim($classPrefix, '\\') . '\\';
            $path = str_replace('\\', '/', rtrim($path, '/\\')) . '/';

            spl_autoload_register(function($class) use ($classPrefix, $path) {
                if(false !== stripos($class, $classPrefix)) {
                    $fileBase = str_replace('\\', '/', mb_substr($class, mb_strlen($classPrefix) - 1));
                    $realFilePath = $path . ltrim($fileBase, '/') . '.php';

                    require($realFilePath);
                }

                return false;
            });
        }

        $this->commands = new CommandsCollection();

        foreach($this->internalCommands as $command) {
            /** @var AbstractCommand $commandInstance */
            $commandInstance = new $command();
            $commandInstance->setApplication($this);

            $this->commands->add($commandInstance);
        }

        foreach($commandPaths as $path) {
            $iterator = new \DirectoryIterator($path);

            foreach($iterator as $fileInfo) {
                $commandInstance = $this->registerCommandFile($fileInfo);

                if($commandInstance instanceof AbstractCommand) {
                    $this->commands->add($commandInstance);
                }
            }
        }
    }

    /**
     * @param \SplFileInfo $fileInfo
     * @return AbstractCommand
     */
    public function registerCommandFile(\SplFileInfo $fileInfo)
    {
        $filePath = $fileInfo->getRealPath();
        $escapedFilePath = escapeshellarg($fileInfo->getRealPath());
        $commandInstance = null;

        if($fileInfo->isFile() && $fileInfo->isReadable()
            && 'php' === strtolower($fileInfo->getExtension())
            && preg_match(self::COMMAND_REGEX, `head -1 {$escapedFilePath}`, $matches)) {
            require_once($filePath);

            $command = $matches['commandClass'];
            /** @var AbstractCommand $commandInstance */
            $commandInstance = new $command();

            if(!($commandInstance instanceof AbstractCommand)) {
                throw new \RuntimeException(sprintf(
                    "Command '%s' MUST extend '%s' class",
                    $command,
                    AbstractCommand::class
                ));
            }

            $commandInstance->setApplication($this);
        }

        return $commandInstance;
    }
} 