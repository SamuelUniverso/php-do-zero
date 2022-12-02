<?php

namespace App\Controllers;

class HomeController
{
    public function hello($params)
    {
        return "Olá {$params[1]}";
    }
}
