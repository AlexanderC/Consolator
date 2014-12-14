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
    const GIST_TPL = 'https://gist.githubusercontent.com/%s/%s/raw//';
    const GIST_REGEX = "#^https://gist.github.com/(?P<author>[^/]+)/(?P<id>[^/]+)$#ui";

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
        $showHelp = $input->has('show-help', AbstractInput::LONG_OPTION);
        $isPrototype = $input->has('proto', AbstractInput::LONG_OPTION);
        $isGist = $input->has('gist', AbstractInput::LONG_OPTION);
        $isRemote = $input->has('remote', AbstractInput::LONG_OPTION) || $isGist;

        if(empty($commandFile)) {
            throw new \RuntimeException("Command file/name/url must be provided");
        }

        $commandOutput = clone $output;
        $commandInput = $input->cloneFiltered(function($value, $key, $type) {
            return !($type === AbstractInput::ARGUMENT && $key === 'commandFile')
                && !($type === AbstractInput::LONG_OPTION && $key === 'show-help')
                && !($type === AbstractInput::LONG_OPTION && $key === 'proto')
                && !($type === AbstractInput::LONG_OPTION && $key === 'remote')
                && !($type === AbstractInput::LONG_OPTION && $key === 'gist');
        });

        if($showHelp) {
            $commandInput->add('help', true, AbstractInput::LONG_OPTION);
        }

        if($isRemote) {
            if($isGist) {
                if(!preg_match(self::GIST_REGEX, $commandFile, $matches)) {
                    throw new \RuntimeException("Invalid gist url given");
                }

                $commandFile = sprintf(self::GIST_TPL, $matches['author'], $matches['id']);
            }

            $realCommandFile = sprintf(
                "%s/CSL_REMOTE_%s_%s.php",
                sys_get_temp_dir(),
                md5($commandFile),
                sha1($commandFile)
            );

            if(!is_file($realCommandFile)) {
                passthru(sprintf(
                    "curl %s --output %s --progress-bar --insecure",
                    escapeshellarg($commandFile),
                    $realCommandFile
                ));
            }
        } else {
            $realCommandFile = sprintf("%s/%s", rtrim(getcwd(), '/'), ltrim($commandFile, '/'));
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