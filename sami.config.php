<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/15/14
 * Time: 10:24
 */

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/src')
;

return new Sami($iterator, [
    //'theme' => 'symfony',
    'title' => 'Consolator v1.0 API',
    'build_dir' => __DIR__ . '/io-docs',
    'cache_dir' => sys_get_temp_dir(),
    'default_opened_level' => 2,
]);