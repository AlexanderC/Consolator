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
     * @var array
     */
    protected $arguments = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $longOptions = [];

    /**
     * @return $this
     */
    public function defineArguments(/* $arg1, $arg2, ... */)
    {
        foreach(func_get_args() as $key => $name) {
            if(array_key_exists($key, $this->arguments)) {
                $this->add($name, $this->arguments[$key], self::ARGUMENT);
                unset($this->arguments[$key]);
            }
        }

        return $this;
    }

    /**
     * @param callable $filter
     * @return $this
     */
    public function cloneFiltered(callable $filter)
    {
        $originalArguments = $this->arguments;
        $originalOptions = $this->options;
        $originalLongOptions = $this->longOptions;

        foreach($this->arguments as $key => $argument) {
            if(!(bool) call_user_func($filter, $argument, $key, $type = self::ARGUMENT)) {
                unset($this->arguments[$key]);
            }
        }

        foreach($this->options as $key => $option) {
            if(!(bool) call_user_func($filter, $option, $key, $type = self::OPTION)) {
                unset($this->options[$key]);
            }
        }

        foreach($this->longOptions as $key => $option) {
            if(!(bool) call_user_func($filter, $option, $key, $type = self::LONG_OPTION)) {
                unset($this->longOptions[$key]);
            }
        }

        $newInput = clone $this;

        $this->arguments = $originalArguments;
        $this->options = $originalOptions;
        $this->longOptions = $originalLongOptions;

        return $newInput;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param int $type
     * @return $this
     */
    public function add($name, $value, $type)
    {
        if($type & self::ARGUMENT) {
            $this->arguments[$name] = $value;
        }

        if($type & self::OPTION) {
            $this->options[$name] = $value;
        }

        if($type & self::LONG_OPTION) {
            $this->longOptions[$name] = $value;
        }

        return $this;
    }

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
     * @param string $name
     * @param mixed $defaultValue
     * @param int $type
     * @return string
     * @throws MissingInputException
     */
    abstract public function get($name, $defaultValue = null, $type = self::ALL);
} 