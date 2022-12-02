<?php

require "vendor/autoload.php";

use Rosa\PhpDoZero\Router;

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

$router = new Router($method, $path);

$router->get('/', function() {
    return "Olá mundo!";
});

$router->get('/ola-{nome}', function($params) {
    return "Olá " . $params[1]; /// 0 is the entire route
});

$result = $router->handler();

if(!$result) {
    http_response_code(404);
    echo "Página não encontrada!";
    exit();
}

echo $result($router->getParams());
