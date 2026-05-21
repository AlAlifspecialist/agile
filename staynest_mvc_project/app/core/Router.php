<?php

class Router
{

    private $routes = [];

    public function __construct()
    {

    }

    public function get($url, $controller)
    {
        $this->routes['GET'][$url] = $controller;
    }

    public function post($url, $controller)
    {
        $this->routes['POST'][$url] = $controller;
    }

    public function dispatch()
    {

        $request = $_GET['url'] ?? '';

        $request = trim($request, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        if(isset($this->routes[$method][$request]))
        {

            $controllerAction = $this->routes[$method][$request];

            $parts = explode('@', $controllerAction);

            $controllerName = $parts[0];

            $actionName = $parts[1];

            require_once "../app/controllers/" . $controllerName . ".php";

            $controller = new $controllerName();

            $controller->$actionName();

        }
        else
        {

            echo "<h1>404 - Page not found</h1>";

        }

    }

}
?>