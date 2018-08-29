<?php
use App\Core\Router;
session_start();
define('APPLICATION_PATH', getcwd().'/../app/');
define('PUBLIC_PATH', getcwd());

require APPLICATION_PATH .'/../vendor/autoload.php';


$routers = explode('/', $_SERVER['REQUEST_URI']);

$fileName = 'default';
$actionName = 'actionIndex';
if (!empty($routers[1])) {
    $fileName = $routers[1];
}

if (!empty($routers[2])) {
    $actionName = 'action' . ucfirst($routers[2]);

}
if (!empty($routers[3])) {
    $param = $routers[3];
}

$nameController = APPLICATION_PATH . 'Controllers/' . ucfirst($fileName) . 'Controller.php';

try {
    if (file_exists($nameController)) {
        require_once $nameController;
    } else {
        throw new Exception('Файл не существует');
    }
    $class_name = '\App\\' . ucfirst($fileName) . 'Controller';

    if (class_exists($class_name)) {
        $class = new $class_name;
    } else {
        throw new Exception('Класс отсутствует');
    }

    if (method_exists($class, $actionName)) {
        $class->$actionName();
    } else {
        throw new Exception('Метот не найден');
    }
} catch (Exception $e) {
    //Выводим сообщение об исключении.
    require APPLICATION_PATH . '/errors/404.php';
}