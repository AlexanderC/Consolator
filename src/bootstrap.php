<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 13:46
 */

namespace AlexanderC\Consolator;

set_time_limit(0);

define("CSL_CLASS_PREFIX", "AlexanderC\\Consolator\\");
define("CSL_LIB_PATH", __DIR__ . "/Consolator/");

/**
 * @param array $configArray
 * @return Application
 */
function bootstrap(array $configArray = null)
{
    if (php_sapi_name() != 'cli') {
        throw new \RuntimeException("CLI sapi is only allowed.");
    }

    require_once(CSL_LIB_PATH . 'Config.php');
    require_once(CSL_LIB_PATH . 'Application.php');

    $workingDirectory = getcwd();

    $configArray = array_merge([
        Config::COMMAND_PATHS => [$workingDirectory],
        Config::AUTOLOAD_MAPPING => ['\\' => $workingDirectory]
    ], $configArray ? : []);

    if(!is_array($configArray[Config::COMMAND_PATHS])) {
        $configArray[Config::COMMAND_PATHS] = [$configArray[Config::COMMAND_PATHS]];
    }

    $configArray[Config::AUTOLOAD_MAPPING][CSL_CLASS_PREFIX] = CSL_LIB_PATH;
    // TODO: fix failing inside phar archives
    //$configArray[Config::COMMAND_PATHS][] = CSL_LIB_PATH . 'Command/Implementation/';

    $config = Config::fromArray($configArray);

    return new Application($config);
}