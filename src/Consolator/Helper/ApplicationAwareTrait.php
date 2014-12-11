<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 14:00
 */

namespace AlexanderC\Consolator\Helper;


use AlexanderC\Consolator\Application;

/**
 * Class ApplicationAwareTrait
 * @package AlexanderC\Consolator\Helper
 */
trait ApplicationAwareTrait 
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @param Application $application
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
    }
} 