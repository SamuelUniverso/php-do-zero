<?php

require "vendor/autoload.php";

use App\HomeController;
use Rosa\PhpDoZero\Router;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Router($method, $path);

$router->get('/', function() {
    return "Olá mundo!";
});

$router->get('/ola-{nome}', 'App\HomeController::hello');

$result = $router->handler();

if(!$result) {
    http_response_code(404);
    echo "Página não encontrada!";
    exit();
}

if ($result instanceof clojure) {
    echo $result($router->getParams());
}
elseif(is_string(($result))) {
    $result = explode('::', $result);

    $controller = new $result[0];
    $action = $result[1];

    echo $controller->$action($router->getParams());
}
