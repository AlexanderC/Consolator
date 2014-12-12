<?php #CSL::CMD(AlexanderC\Consolator\Command\Implementation\RunCommand)
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 16:41
 */

namespace AlexanderC\Consolator\Command\Implementation;


use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\Helper\MultiName;
use AlexanderC\Consolator\Command\Implementation\Helper\CommandPrototype;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;

/**
 * Class ListCommand
 * @package AlexanderC\Consolator\Command\Implementation
 */
class RunCommand extends AbstractCommand
{
    const NAME = 'run';
    const SHORT_NAME = 'r';

    /**
     * @return string|MultiName
     */
    public function getName()
    {
        return new MultiName([self::NAME, self::SHORT_NAME]);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return 'Run certain command using given file';
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return <<<EOF
/f[inverted] ./console run command [--proto][--show-help]/!f
/f[green]Options:
    command - command file path or existing command name
    --proto - run command prototype
    --show-help - show command help
EOF;
    }

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run(AbstractInput $input, AbstractOutput $output)
    {
        $input->defineArguments('commandFile');

        $command = null;
        $commandFile = $input->get('commandFile', null, AbstractInput::ARGUMENT);
        $realCommandFile = sprintf("%s/%s", rtrim(getcwd(), '/'), ltrim($commandFile, '/'));
        $showHelp = $input->has('show-help', AbstractInput::LONG_OPTION);
        $isPrototype = $input->has('proto', AbstractInput::LONG_OPTION);

        if(empty($commandFile)) {
            throw new \RuntimeException("Command file/name must be provided");
        }

        $commandOutput = clone $output;
        $commandInput = $input->cloneFiltered(function($value, $key, $type) {
            return !($type === AbstractInput::ARGUMENT && $key === 'commandFile')
                && !($type === AbstractInput::LONG_OPTION && $key === 'show-help')
                && !($type === AbstractInput::LONG_OPTION && $key === 'proto');
        });

        if($showHelp) {
            $commandInput->add('help', true, AbstractInput::LONG_OPTION);
        }

        if(is_file($realCommandFile)) {
            if($isPrototype) {
                $prototype = new CommandPrototype();

                $include = function() use ($prototype, $realCommandFile) {
                    $p = $prototype;

                    require($realCommandFile);
                };
                $include();

                if($showHelp) {
                    $output->writeln("/f[inverted+green]%s/!f", [$prototype->help]);
                }

                return $prototype->run($commandInput, $commandOutput);
            } else {
                $command = $this->application->registerCommandFile(new \SplFileInfo($realCommandFile));

                if(!$command) {
                    throw new \RuntimeException(sprintf("Invalid command file given ('%s')", $realCommandFile));
                }
            }
        } else {
            $command = $this->application->resolveCommand($commandFile);

            if(!$command) {
                throw new \RuntimeException(sprintf("Command nor command file '%s' found", $commandFile));
            }
        }

        return $this->application->runCommand($command, $commandInput, $commandOutput);
    }
} 