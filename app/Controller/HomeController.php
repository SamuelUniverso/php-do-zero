<?php

namespace App\Controller;

use App\Model\User;
use Twig\Environment;

class HomeController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function hello($params)
    {
        return "Olá {$params[1]}";
    }

    public function listUsers()
    {
        return $this->twig->render('users/users.html', ['users' => User::all()]);
    }
}
