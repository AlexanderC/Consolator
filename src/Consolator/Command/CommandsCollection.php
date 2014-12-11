<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:17
 */

namespace AlexanderC\Consolator\Command;


use AlexanderC\Consolator\Command\Helper\MultiName;
use Traversable;

/**
 * Class CommandsCollection
 * @package AlexanderC\Consolator\Command
 */
class CommandsCollection implements \IteratorAggregate
{
    /**
     * @var AbstractCommand[]
     */
    protected $commands = [];

    /**
     * @var AbstractCommand[]
     */
    protected $mapping = [];

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->commands);
    }

    /**
     * @param AbstractCommand $command
     * @return $this
     */
    public function add(AbstractCommand $command)
    {
        $this->commands[] = $command;

        $this->updateMapping($command);

        return $this;
    }

    /**
     * @param string $name
     * @return AbstractCommand
     */
    public function resolve($name)
    {
        $name = strtolower($name);

        return isset($this->mapping[$name]) ? $this->mapping[$name] : null;
    }

    /**
     * @param string $name
     * @return string
     */
    public function guess($name)
    {
        $name = strtolower($name);

        if(isset($this->mapping[$name])) {
            return $name;
        }

        $closest = [PHP_INT_MAX, null];

        foreach(array_keys($this->mapping) as $commandName) {
            $distance = levenshtein($name, $commandName);

            if($distance < $closest[0]) {
                $closest[0] = $distance;
                $closest[1] = $commandName;
            }
        }

        return $closest[1];
    }

    /**
     * @param AbstractCommand $command
     * @return $this
     */
    protected function updateMapping(AbstractCommand $command)
    {
        $names = $command->getName();

        if($names instanceof MultiName) {
            $names = $names->getNames();
        } else {
            $names = [$names];
        }

        foreach($names as $name) {
            $this->mapping[strtolower($name)] = $command;
        }

        return $this;
    }
} 