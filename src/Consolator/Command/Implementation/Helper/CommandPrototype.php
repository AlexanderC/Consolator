<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/12/14
 * Time: 16:57
 */

namespace AlexanderC\Consolator\Command\Implementation\Helper;


use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;

/**
 * Class CommandPrototype
 * @package AlexanderC\Consolator\Command\Implementation\Helper
 */
class CommandPrototype 
{
    /**
     * @var string
     */
    public $help = AbstractCommand::NO_HELP;

    /**
     * @var callable
     */
    public $command;

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run(AbstractInput $input, AbstractOutput $output)
    {
        if(is_callable($this->command)) {
            return call_user_func($this->command, $input, $output);
        }

        return AbstractCommand::SUCCESS;
    }
}