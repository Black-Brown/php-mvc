<?php

namespace lib;

class Route 
{
    private static $routes = [];


    public static function get($url, $callback)
    {
        $url = trim($url, '/');
        self::$routes['GET'][$url] = $callback;

    } 

    public static function post()
    {
        self::$routes['POST'][$url] = $callback;

    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        $url = trim($url, '/');

        if (isset(self::$routes[$method][$url])) {
            call_user_func(self::$routes[$method][$url]);
        } else {
            http_response_code(404);
            echo '404 Not Found';
        }
    }
}