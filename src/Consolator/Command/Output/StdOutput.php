<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:47
 */

namespace AlexanderC\Consolator\Command\Output;


use AlexanderC\Consolator\Command\Output\Formatter\AbstractFormatter;
use AlexanderC\Consolator\Command\Output\Formatter\ColorFormatter;

/**
 * Class StdOutput
 * @package AlexanderC\Consolator\Command\Output
 */
class StdOutput extends AbstractOutput
{
    /**
     * @var AbstractFormatter[]
     */
    protected $formatters = [];

    /**
     * @var resource
     */
    protected $outStream;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->formatters[] = new ColorFormatter();
        $this->outStream = fopen('php://stdout', 'w');
    }

    /**
     * @param string $message
     * @param array $parameters
     * @return bool
     */
    public function write($message, array $parameters = null)
    {
        fwrite($this->outStream, $this->format(vsprintf($message, $parameters)));
    }

    /**
     * @param string $message
     * @param array $parameters
     * @return bool
     */
    public function writeln($message, array $parameters = null)
    {
        $this->write($message . PHP_EOL, $parameters ? : []);
    }

    /**
     * @param string $message
     * @return string
     */
    protected function format($message)
    {
        foreach($this->formatters as $formatter) {
            $message = $formatter->format($message);
        }

        return $message;
    }

    /**
     * @return void
     */
    public function flush()
    {
        if(is_resource($this->outStream)) {
            fflush($this->outStream);
            fclose($this->outStream);
        }
    }
}