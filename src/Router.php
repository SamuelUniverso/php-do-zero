<?php

namespace Rosa\PhpDoZero;

class Router
{
    private $routes = [];
    private $method;
    private $path;
    private $params;

    public function __construct($method, $path)
    {
        $this->method = $method;
        $this->path = $path;
    }

    /**
     * @method get
     * @return void
     */
    public function get(string $route, $action)
    {
        $this->add('GET', $route, $action);
    }

    /**
     * @method post
     * @return void
     */
    public function post(string $route, $action)
    {
        $this->add('POST', $route, $action);
    }

    /**
     * @method add
     */
    public function add(string $method, string $route, $action)
    {
        $this->routes[$method][$route] = $action;
    }

    /**
     * @method getParams
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @method handler
     */
    public function handler()
    {
        if (empty($this->routes[$this->method])) {
            return function() {
                false;
            };
        }

        if (isset($this->routes[$this->method][$this->path])) {
            return $this->routes[$this->method][$this->path]; // clojure
        }

        foreach($this->routes[$this->method] as $route => $action) {
            $result = $this->checkUrl($route, $this->path);
            if($result >= 1) {
                return $action;
            }
        }

        return function() {
            false;
        };
    }

    private function checkUrl(string $route, $path)
    {
        /// get expression between curly braces into $variables
        preg_match_all('/\{([^\}]*)\}/', $route, $variables);

        $regex = str_replace('/', '\/', $route);

        foreach($variables[0] as $key => $variable) {
            $replacement = '([a-zA-Z0-9\-\_ ]+)';
            $regex = str_replace($variable, $replacement, $regex);
        }

        /// reomove curly braces
        $regex = preg_replace('/{([a-zA-Z+])}/', '([a-zA-Z0-9+])', $regex);

        /// executing regex
        $result = preg_match('/^'.$regex.'$/', $path, $params);

        $this->params = $params;

        return $result;
    }
}
