<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:51
 */

namespace AlexanderC\Consolator\Command\Output\Formatter;


/**
 * Class AbstractFormatter
 * @package AlexanderC\Consolator\Command\Output\Formatter
 */
abstract class AbstractFormatter
{
    /**
     * @param string $string
     * @return string
     */
    abstract public function format($string);
} 