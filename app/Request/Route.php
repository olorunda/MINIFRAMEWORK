<?php


namespace App\Request;


class Route
{



    public static function getRoute()
    {
        return (new Request())->request()->path_info ?? '';
    }


    public static function get($path, $class_method)
    {


        if ((new Request())->request()->request_method !== 'GET') {
            throw new \Exception('Invalid Method Name');
        }


        if ($path != self::getRoute()) {
            throw new \Exception('Route Not Found');
        }

        return self::callController($class_method);
    }


    public static function post($path, $class_method)
    {

        if ((new Request())->request()->request_method !== 'POST') {
            throw new \Exception('Invalid Method Name');
        }

        if ($path != self::getRoute()) {
            throw new \Exception('Route Not Found');
        }
        return self::callController($class_method);
    }


    public static function callController($class_method)
    {
        $class = explode('@', $class_method);
        $class_name = "\\App\\Controllers\\$class[0]";
        $method = $class[1];
        return (new $class_name())->$method();
    }
}
