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
 * Class StdInput
 * @package AlexanderC\Consolator\Command\Input
 */
class StdInput extends AbstractInput
{
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
     * @param array $input
     */
    public function __construct(array $input)
    {
        $this->parseInput($input);
    }

    /**
     * @param array $input
     */
    protected function parseInput(array $input)
    {
        foreach($input as $rawInput) {
            if(preg_match('/^\-(?P<name>[^\-][^=]*)(?:=(?P<value>.*))?$/ui', $rawInput, $matches)) {
                // case we do not have any equal char out there...
                if(!array_key_exists('value', $matches)) {
                    $matches['value'] = substr($matches['name'], 1);
                    $matches['name'] = substr($matches['name'], 0, 1);
                }

                $this->options[$matches['name']] = $matches['value'];
            } elseif(preg_match('/^\-\-(?P<name>[^\-][^=]*)(?:=(?P<value>.*))?$/ui', $rawInput, $matches)) {
                $this->longOptions[$matches['name']] = array_key_exists('value', $matches) ? $matches['value'] : null;
            } else {
                $this->arguments[] = $rawInput;
            }
        }
    }

    /**
     * @param int $type
     * @return array
     */
    public function all($type = self::ALL)
    {
        if($type & self::ALL) {
            return array_merge($this->arguments, $this->options, $this->longOptions);
        } elseif($type & self::ARGUMENT) {
            return $this->arguments;
        } elseif($type & self::OPTION) {
            return $this->options;
        } elseif($type & self::LONG_OPTION) {
            return $this->longOptions;
        }

        throw new \RuntimeException("Unknown input type");
    }

    /**
     * @param string $name
     * @param int $type
     * @return bool
     */
    public function has($name, $type = self::ALL)
    {
        return array_key_exists($name, $this->all($type));
    }

    /**
     * @param $name
     * @param int $type
     * @return string
     * @throws MissingInputException
     */
    public function get($name, $type = self::ALL)
    {
        if(!$this->has($name, $type)) {
            throw new MissingInputException(sprintf("No such input of type '%d' and name '%s'", $type, $name));
        }

        return $this->all($type)[$name];
    }
} 