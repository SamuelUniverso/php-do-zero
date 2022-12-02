<?php

use Illuminate\Database\Capsule\Manager;

$capsule = new Manager();

$capsule->addConnection([
    'driver'    => 'pgsql',
    'host'      => 'localhost',
    'database'  => 'php_do_zero',
    'username'  => 'postgres',
    'password'  => 'postgres',
    'charset'   => 'utf8',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
