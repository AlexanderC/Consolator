Input
=====

By default is used `StdInput` that reads all the arguments and options from `$argv`.

Input types:
```php
    const ALL = 0x001;
    const OPTION = 0x002;
    const LONG_OPTION = 0x004;
    const ARGUMENT = 0x008;
```

Api:
`$i->defineArguments('somearg', 'someotherarg')` - this method is used to set names to the arguments provided instead of regular indexes(`0`, `1` etc.)
`$i->all($type = self::ALL)` - retrieve all the input by its type
`$i->has($name, $type = self::ALL)` - check for input variable availability
`$i->get($name, $defaultValue = null, $type = self::ALL)` - get input variable value by its type (default set to NULL if missing)

Output
======

By default is used `StdOutput` that flushes the output to the regular `stdout`.

Api:
`$o->write($message, array $parameters = null)` - output a message. Parameters are provided to the `vsprintf()`
`$o->writeln($message, array $parameters = null)` - do the same as `write()` and add a new line to the end of message

Color output:
`"/b[white]/f[blink+green]some message here/!f/!b"` - would output a green text on a white background that blinks.

Explanation of colored output:
    - `/f[...]` - set foreground (can be combined with the `+` sign)
    - `/b[...]` - set background
    - `/!f` & `/!b` - are aliases that terminates colored output and reset output to the defaults
    
Available colors:
```php
    protected $backgroundMapping = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47',
        'white' => '107',
    ];

    protected $foregroundMapping = [
        'black' => '30',
        'blue' => '34',
        'green' => '32',
        'cyan' => '36',
        'red' => '31',
        'purple' => '35',
        'brown' => '33',
        'yellow' => '33',
        'white' => '37',
        'blink' => '5',
        'inverted' => '7',
        'bold' => '1',
        'dim' => '2',
        'underlined' => '4',
        'hidden' => '8',
    ];
```