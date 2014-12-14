<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/12/14
 * Time: 16:57
 */

namespace AlexanderC\Consolator\Command\Implementation\Helper;


use AlexanderC\Consolator\Command\AbstractCommand;
use AlexanderC\Consolator\Command\Input\AbstractInput;
use AlexanderC\Consolator\Command\Output\AbstractOutput;

/**
 * Class CommandPrototype
 * @package AlexanderC\Consolator\Command\Implementation\Helper
 */
class CommandPrototype 
{
    /**
     * @var string
     */
    public $help = AbstractCommand::NO_HELP;

    /**
     * @var callable
     */
    public $command;

    /**
     * @param AbstractInput $input
     * @param AbstractOutput $output
     * @return int
     */
    public function run(AbstractInput $input, AbstractOutput $output)
    {
        if(is_callable($this->command)) {
            return call_user_func($this->command, $input, $output);
        }

        return AbstractCommand::SUCCESS;
    }

    /**
     * @param string $file
     * @return $this
     */
    public function loadFile($file)
    {
        $p = $this;
        $prototype = $this;

        @ob_end_flush();
        ob_start();
        $callable = require($file);
        $code = ob_get_clean();

        if(!is_callable($this->command)) {
            $this->command = is_callable($callable) ? $callable : $this->createCallable($code);
        }

        return $this;
    }

    /**
     * @param string $code
     * @return callable
     */
    protected function createCallable($code)
    {
        $functionBody = <<<EOF
\$i = \$input;
\$o = \$output;

try {
    {$code}
} catch(\Exception \$e) {
    \$output->writeln(
        "/f[red]Exception of type '%s' thrown: /f[inverted]%s\n\n/b[red]/f[white]%s/!f",
        [get_class(\$e), \$e->getMessage(), \$e->getTraceAsString()]
    );

    return 1;
}

return 0;
EOF;

        return create_function('$input,$output', $functionBody);
    }
}