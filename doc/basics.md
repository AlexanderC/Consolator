Command line
============
    - `consolator list` for listing
    - `consolator help` for help
    - `consolator command_name/command_file.php` to run existing command (all the arguments and options are proxied)
    - `consolator --help` to see command man page (available any command)


Library usage
=============

Create own command line tool:
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

Register command line examples:
```php
<?php #CSL::CMD(My\NS\ExampleCommand)
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

...but, you can prototype with ease!
```php
<?php
$p->help = "Prototype test help...";
$p->command = function($i, $o) {
    $name = $i->get('name', 'Anonymous');
    $o->writeln("/f[green]Your name is /f[blink+inverted]%s/!f", [$name]);
    return 0;
};

// ...run it: consolator ./test/prototype.php --name="John Doe" --proto
```

..or even so:
```php
<?php
return function($i, $o) {
    $name = $i->get('name', 'Anonymous');
    $o->writeln("/f[green]Your name is /f[blink+inverted]%s/!f", [$name]);
    return 0;
};

// ...run it: consolator ./test/prototypeCallable.php --name="John Doe" --proto
```

not enough? than try this:
```php
$name = $i->get('name', 'Anonymous');
$o->writeln("/f[green]Your name is /f[blink+inverted]%s/!f", [$name]);

// ...run it: consolator ./test/prototypeContent.php --name="John Doe" --proto
```

For more examples check `./test/` directory.