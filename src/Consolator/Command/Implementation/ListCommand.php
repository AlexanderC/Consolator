<?php #CSL::CMD(AlexanderC\Consolator\Command\Implementation\ListCommand)
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 16:41
 */

namespace AlexanderC\Consolator\Command\Implementation;


use AlexanderC\Consolator\Application;
use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\Helper\MultiName;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;

/**
 * Class ListCommand
 * @package AlexanderC\Consolator\Command\Implementation
 */
class ListCommand extends AbstractCommand
{
    const NAME = 'list';
    const SHORT_NAME = 'l';

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
        return 'List all available commands';
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return self::NO_HELP;
    }

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run(AbstractInput $input, AbstractOutput $output)
    {
        $output->writeln("/f[underlined+green]Available commands/!f\n");

        /** @var AbstractCommand $command */
        foreach($this->application->getCommands() as $command) {
            $output->writeln("\t/f[green]%s: /f[inverted]%s/!f", [$command->getName(), $command->getDescription()]);
        }

        $output->writeln("");

        return self::SUCCESS;
    }
} 