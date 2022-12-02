<?php

require "vendor/autoload.php";
require "database.php";

use Rosa\PhpDoZero\Router;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Router($method, $path);

$router->get('/', function() {
    return "Olá mundo!";
});

$router->get('/ola-{nome}', 'App\Controller\HomeController::hello');

$router->get('/users', 'App\Controller\HomeController::listUsers');

$result = $router->handler();

if(!$result) {
    http_response_code(404);
    echo "Página não encontrada!";
    exit();
}

$twig = require(__DIR__ . '/render.php');

if ($result instanceof clojure) {
    echo $result($router->getParams());
}
elseif(is_string(($result))) {
    $result = explode('::', $result);

    $controller = new $result[0]($twig); /// HomeController($twig)
    $action = $result[1];

    echo $controller->$action($router->getParams());
}
