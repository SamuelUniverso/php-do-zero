<?php

namespace App;

class HomeController
{
    public function hello($params)
    {
        return "Olá {$params[1]}";
    }
}
