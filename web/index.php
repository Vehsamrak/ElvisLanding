<?php

use Vehsamrak\Vehsa\ErrorHandler;
use Vehsamrak\Vehsa\Router;

define('ROOT_DIRECTORY', join(DIRECTORY_SEPARATOR, [__DIR__, '..', 'src']));
require join(DIRECTORY_SEPARATOR, [ROOT_DIRECTORY, '..', 'vendor', 'autoload.php']);

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    $namespace = str_replace('\\', '/', __NAMESPACE__) ?: '/';
    $class = ROOT_DIRECTORY . $namespace . $className . '.php';

    if (file_exists($class)) {
        include_once($class);
    }
});

$router = new Router();
$errorHandler = new ErrorHandler();

try {
    $router->run();
} catch (\Exception $exception) {
    $errorHandler->handle($exception);
}
