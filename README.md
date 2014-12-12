Consolator
==========

Consolator- fast console application prototyping tool

Requirements
============
    - PHP v5.5 and higher
    - Phar extension
    - *Nix OS

Installation
============

Run the following command from console
`curl -XGET 'https://raw.githubusercontent.com/AlexanderC/Consolator/master/bin/install.sh' | bash`

Usage
=====

Using command line util
`consolator list`

Including library
```php
#!/usr/bin/env php
<?php 
require 'consolator.phar'

$application = \AlexanderC\Consolator\bootstrap([
    'commandPaths' => __DIR__, // the path where commands are located
    'autoload' => ["My\\NS\\" => __DIR__] // PSR0 autoloading paths
]);

$application->terminate($application->run());
```

Command example
```php
<?php
namespace My\NS;

class ExampleCommand extends \AlexanderC\Consolator\Command\AbstractCommand
{
        public function getName()
        {
            return "example";
        }
    
        public function getDescription()
        {
            return "My command example.";
        }
    
        public function getHelp()
        {
            return "Some help";
        }
    
        public function run(
            \AlexanderC\Consolator\Command\Input\AbstractInput $input, 
            \AlexanderC\Consolator\Command\Output\AbstractOutput $output)
        {
            $output->writeln("My example command...");
    
            return 0;
        }
}
```

For more examples check `./test/` directory.