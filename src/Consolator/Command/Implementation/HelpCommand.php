<?php #CSL::CMD(AlexanderC\Consolator\Command\Implementation\HelpCommand)
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
 * Class HelpCommand
 * @package AlexanderC\Consolator\Command\Implementation
 */
class HelpCommand extends AbstractCommand
{
    const NAME = 'help';
    const SHORT_NAME = 'h';

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
        return 'Displays general help information';
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
        $text = <<<EOF
/f[green]Usage:/!f /f[inverted+green]./console your-command "some arg" -short-opt="some value" --long-opt/!f

/f[green]List all available commands:/!f /f[inverted+green]./console list/!f
EOF;
        $output->writeln($text);

        return 0;
    }
} 