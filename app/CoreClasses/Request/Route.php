<?php


namespace App\CoreClasses\Request;


use App\CoreClasses\Traits\JsonResponse;
use App\CoreClasses\Traits\MiddleWareTrait;
use App\CoreClasses\Traits\SessionTrait;
class Route
{

use MiddleWareTrait  ,SessionTrait;

        use JsonResponse;

        public $param='';
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
        header('Content-Type:application/json');
    }

    public static function getRoute()
    {

        return (new Request())->request()->path_info ?? '';

    }


    public static function get($path, $class_method, array $middleware = [])
    {
        $param='';
        if(str_contains($path,'{')){

            $path=explode('/{',$path);
            $param=ltrim(str_replace($path[0],'',self::getRoute()),'/');
            $path=$path[0];

        }


        if ((new Request())->request()->request_method !== 'GET' && str_contains(self::getRoute(),$path)) {
            throw new \Exception('Invalid Method Name');
        }


        if (str_contains(self::getRoute(),$path)) {
             exit(self::callController($class_method, $middleware,$param));
        }

    }


    public static function post($path, $class_method, array $middleware = [])
    {

        $param='';
        if(str_contains('{',$path)){
            $path=explode('/{',$path);
            $param=str_replace('}','',$path[1]);
            $path=$path[0];
        }

        if ((new Request())->request()->request_method !== 'POST' && str_contains($path,self::getRoute())) {
            throw new \Exception('Invalid Request Type');
        }

        if (str_contains(self::getRoute(),$path)) {
             exit(self::callController($class_method, $middleware,$param));
        }

    }


    public static function callController($class_method, array $middleware = [],$param='')
    {

        self::middlewareroute($middleware);


        $class = explode('@', $class_method);
        $class_name = "\\App\\Controllers\\$class[0]";
        $method = $class[1];
        if($param==''){
            return (new $class_name())->$method();
        }
            return (new $class_name())->$method($param);
    }

    private static function middlewareroute($middleware): void
    {
        (new Route())->middleware($middleware);
    }
}
