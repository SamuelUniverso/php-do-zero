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

        /// handler always return clojure
        $result = $router->handler();

        $actual = $result(); /// clojure variable
        $expected = true;

        /// handler shall return 'true'
        $this->assertEquals($expected, $actual);
   }

   public function testeVerificaNaoSeEncontraRota()
   {
        $router = new Router('GET', '/outra-url');

        $router->add('GET', '/ola-mundo', function() {
            return true;
        });

        /// handler always return clojure
        $result = $router->handler();

        $actual = $result(); /// clojure variable
        $expected = true;

        /// handler shall return 'false'
        $this->assertNotEquals($expected, $actual);
   }

   public function testVerificaSeEncontraRotaVariavel()
   {
        $router = new Router('GET', '/ola-samuel');
        $router->add('GET', '/ola-{nome}', function() {
            return true;
        });

        $result = $router->handler();

        $actual = $result();
        $expected = true;
        $this->assertEquals($expected, $actual);
   }

    public function testeVerificaNaoSeEncontraRotaComMetodoErrado()
    {
        $router = new Router('GET', '/outra-url');

        $router->add('POST', '/ola-mundo', function() {
            return true;
        });

        /// handler always return clojure
        $result = $router->handler();

        $actual = $result(); /// clojure variable
        $expected = true;

        /// handler shall return 'false'
        $this->assertNotEquals($expected, $actual);
    }
}
