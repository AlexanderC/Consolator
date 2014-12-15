<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:47
 */

namespace AlexanderC\Consolator\Command\Output;


/**
 * Class AbstractOutput
 * @package AlexanderC\Consolator\Command\Output
 */
abstract class AbstractOutput
{
    /**
     * @param string $message
     * @param array $parameters
     * @return bool
     */
    abstract public function write($message, array $parameters = null);

    /**
     * @param string $message
     * @param array $parameters
     * @return bool
     */
    abstract public function writeln($message, array $parameters = null);

    /**
     * @return void
     */
    abstract public function flush();

    /**
     * {@inheritdoc}
     */
    public function __destruct()
    {
        $this->flush();
    }
} 