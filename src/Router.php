<?php

namespace Rosa\PhpDoZero;

class Router
{
    private $routes = [];
    private $method;
    private $path;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }    
    public function get(string $route, callable $action)
    {
        $this->add('GET', $route, $action);
    }

    public function post(string $route, callable $action)
    {
        $this->add('POST', $route, $action);
    }

    public function add(string $method, string $route, callable $action)
    {
        $this->routes[$method][$route] = $action;
    }

    public function handler()
    {
        if (empty($this->routes[$this->method])) {
            return false;
        }

        if (isset($this->routes[$this->method][$this->path])) {
            return $this->routes[$this->method][$this->path];
        }

        return false;
    }
}
