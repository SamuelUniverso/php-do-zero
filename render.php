<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/templates');

$twig =  new Environment($loader, [
    // 'cache' => __DIR__ . '/cache'
]);

return $twig;
