<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 14:31
 */

namespace AlexanderC\Consolator;


/**
 * Class Config
 * @package AlexanderC\Consolator
 */
class Config extends \stdClass
{
    const COMMAND_PATHS = 'commandPaths';
    const AUTOLOAD_MAPPING = 'autoload';

    /**
     * @param array $config
     * @return static
     */
    public static function fromArray(array $config)
    {
        $self = new static;

        foreach($config as $property => $value) {
            $self->{$property} = $value;
        }

        return $self;
    }
} 