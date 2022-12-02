<?php

namespace Rosa\PhpDoZero;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

   public function testeVerificaSeEncontraRota()
   {
        $router = new Router('GET', '/ola-mundo');

        $router->add('GET', '/ola-mundo', function() {
            return true;
        });

        $result = $router->handler();

        $actual = $result(); /// clojure variable
        $expected = true;

        $this->assertEquals($expected, $actual);
   }

   public function testeVerificaNaoSeEncontraRota()
   {
        $router = new Router('GET', '/outra-url');

        $router->add('GET', '/ola-mundo', function() {
            return true;
        });

        $result = $router->handler();

        $actual = $result;
        $expected = false;

        $this->assertEquals($expected, $actual);
   }

//    public function testeVerificaNaoSeEncontraRotaComMetodoErrado()
//    {
//         ///
//    }

//    public function testeVerificaSeEncontraRotaVariavel()
//    {
//         $router = new Router('GET', '/ola-erik');
//         $router->add('GET', '/ola-{nome}', function() {
//             return true;
//         });

//         $result = $router->handler();

//         $actual = $result();
//         $expected = true;
//         $this->assertEquals($expected, $actual);
//    }
}
