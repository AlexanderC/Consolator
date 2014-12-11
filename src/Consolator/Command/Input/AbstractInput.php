<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 14:06
 */

namespace AlexanderC\Consolator\Command\Input;


use AlexanderC\Consolator\Command\Input\Exceptions\MissingInputException;

/**
 * Class AbstractInput
 * @package AlexanderC\Consolator\Command\Input
 */
abstract class AbstractInput
{
    const ALL = 0x001;
    const OPTION = 0x002;
    const LONG_OPTION = 0x004;
    const ARGUMENT = 0x008;

    /**
     * @param int $type
     * @return array
     */
    abstract public function all($type = self::ALL);

    /**
     * @param string $name
     * @param int $type
     * @return bool
     */
    abstract public function has($name, $type = self::ALL);

    /**
     * @param $name
     * @param int $type
     * @return string
     * @throws MissingInputException
     */
    abstract public function get($name, $type = self::ALL);
} 