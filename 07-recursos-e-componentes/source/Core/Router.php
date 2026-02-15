<?php

namespace Source\Core;

class Router
{
    protected static $route;

    public static function get(string $route, $handler): void
    {
        $get = "/" . filter_input(INPUT_GET, "url", FILTER_SANITIZE_SPECIAL_CHARS);
        self::$route = [
            $route => [
                "route" => $route,
                "controller" => (!is_string($handler) ? $handler : strstr($handler, "@", true)),
                "method" => (!is_string($handler) ? null : str_replace("@", "", strstr($handler, "@")))
            ]
        ];

        self::dispacth($get);
    }

    public static function dispacth($route): void
    {
        $route = (self::$route[$route] ?? []);

        if($route){
            if($route["controller"] instanceof \Closure){
                call_user_func($route["controller"]);
                return;
            }

            $controller = self::namespace() . $route['controller'];
            $method = $route['method'];

            if(class_exists($controller)){
                $newController = new $controller();

                if(method_exists($newController, $method)){
                    $newController->$method();
                }
            }
        }
    }

    public static function routes(): array
    {
        return self::$route;
    }

    private static function namespace(): string
    {
        return "Source\\App\\Controllers\\";
    }
}