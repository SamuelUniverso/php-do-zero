<?php

namespace App\Controller;

use App\Model\User;
use Twig\Environment;

class HomeController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        var_dump($twig);
        $this->twig = $twig;
    }

    public function hello($params)
    {
        return "Olá {$params[1]}";
    }

    public function listUsers()
    {
        return $this->twig->redner('users/index.html'. ['users' => User::all()]);
    }
}
