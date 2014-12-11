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
     * @var array
     */
    protected $internalCommands = [
        HelpCommand::class,
        ListCommand::class
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
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run($input = null, $output = null)
    {
        global $argv;

        $mainScript = array_shift($argv);
        $commandName = array_shift($argv) ? : HelpCommand::NAME;

        $input = is_object($input) && $input instanceof AbstractInput ? $input : new StdInput($argv);
        $output = is_object($output) && $output instanceof AbstractOutput ? $output : new StdOutput();

        $command = $this->commands->resolve($commandName);
        $result = 0;

        try {
            if(null === $command) {
                $guessedCommandName = $this->commands->guess($commandName);

                throw new \RuntimeException(sprintf(
                    "Did you mean /f[inverted]%s/!f/b[white]/f[red]?",
                    $guessedCommandName
                ));
            }

            if($input->has(self::HELP_OPTION, AbstractInput::LONG_OPTION)) {
                $output->write("/f[green]Help for '%s': /!f", [$command->getName()]);
                $output->writeln("/f[inverted+green]%s/!f", [$command->getHelp()]);
            } else {
                $result = $command->run($input, $output);
            }
        } catch(\Exception $e) {
            $result = 1;
            $output->writeln('/b[white]/f[red][%s] %s/!f', [get_class($e), $e->getMessage()]);
        }

        $output->flush();

        return $result;
    }

    /**
     * @param int $code
     */
    public function terminate($code = 0)
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
            require_once(__DIR__ . '/Exception/ConfigurationException.php');
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
                    require_once($path . ltrim($fileBase, '/') . '.php');
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
                $filePath = $fileInfo->getRealPath();
                $escapedFilePath = escapeshellarg($fileInfo->getRealPath());

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

                    $this->commands->add($commandInstance);
                }
            }
        }
    }
} 