<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 14:03
 */

namespace AlexanderC\Consolator\Command\Helper;


/**
 * Class MultiName
 * @package AlexanderC\Consolator\Command\Helper
 */
class MultiName 
{
    /**
     * @var array
     */
    protected $names;

    /**
     * @param array $names
     */
    function __construct(array $names)
    {
        $this->names = $names;
    }

    /**
     * @return array
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(',', $this->names);
    }
} 