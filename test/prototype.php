<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/12/14
 * Time: 17:07
 */

$p->help = "Prototype test help...";
$p->command = function($i, $o) {
    $name = $i->get('name', 'Anonymous');
    $o->writeln("/f[green]Your name is /f[blink+inverted]%s/!f", [$name]);
    return 0;
};