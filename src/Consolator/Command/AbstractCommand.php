<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 13:59
 */

namespace AlexanderC\Consolator\Command;


use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;
use AlexanderC\Consolator\Helper\ApplicationAwareTrait;
use AlexanderC\Consolator\Command\Helper\MultiName;

/**
 * Class AbstractCommand
 * @package AlexanderC\Consolator\Command
 */
abstract class AbstractCommand
{
    use ApplicationAwareTrait;

    const NO_HELP = 'There are no special options or arguments available';

    /**
     * @return string|MultiName
     */
    abstract public function getName();

    /**
     * @return string
     */
    abstract public function getDescription();

    /**
     * @return string
     */
    abstract public function getHelp();

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    abstract public function run(AbstractInput $input, AbstractOutput $output);
} 