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

        foreach (self::$routes[$method] as $route => $callback){

            if (strpos($route, ':') !== false) {
                // Handle dynamic parameters
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z]+)', $route);
            }
            

            if (preg_match("#^$route$#", $url, $matches)) {
                $params = array_slice($matches, 1);
                
                $response = $callback(...$params);

                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    echo $response;
                }
                
                return;
            }
        }

        echo "No route found for '$method $url'.";
    }
}