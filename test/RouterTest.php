<?php

namespace Rosa\PhpDoZero;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    public function testeMetodo()
    {
        $actual = (new Router())->handler();
        $expected = true;

        $this->assertEquals($expected, $actual);
    }
}
