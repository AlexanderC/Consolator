<?php #CSL::CMD(AlexanderC\Consolator\Test\HelloWorld)
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:33
 */

namespace AlexanderC\Consolator\Test;


use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\Helper\MultiName;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;

/**
 * Class HelloWorld
 * @package AlexanderC\Consolator\Test
 */
class HelloWorld extends AbstractCommand
{
    /**
     * @return string|MultiName
     */
    public function getName()
    {
        return new MultiName(['hello-world', 'hw']);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return "Simple 'Hello World!' command for testing purposes.";
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return "There are no arguments or options.";
    }

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run(AbstractInput $input, AbstractOutput $output)
    {
        $text = '║ Hello World! ║';
        $enclosureTop = '/b[white]/f[blink+bold+cyan]╔';
        $enclosureTop .= sprintf("%s", str_repeat('═', mb_strlen($text) - 6));
        $enclosureTop .= '╗/!f/!b';

        $enclosureBottom = '/b[white]/f[blink+bold+cyan]╚';
        $enclosureBottom .= sprintf("%s", str_repeat('═', mb_strlen($text) - 6));
        $enclosureBottom .= '╝/!f/!b';

        $output->writeln($enclosureTop);
        $output->writeln('/b[white]/f[blink+bold+cyan]%s/!f/!b', [$text]);
        $output->writeln($enclosureBottom);

        return 0;
    }
}