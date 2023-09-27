<?php


namespace App\CoreClasses\Request;

use App\CoreClasses\Traits\JsonResponse;

class Request
{

    use JsonResponse;
    public $server_object = [];

    public function __construct()
    {
        $this->request();
    }

    public function request()
    {
        foreach ($_SERVER as $key => $value) {
            $this->server_object[strtolower($key)] = $value;
        }
        return (object)$this->server_object;
    }



    public static function get($key)
    {


        return (new Request())->realGet($key);


    }

    public static function headers(){
       return getallheaders();
    }

    public static function  has($key){

        return !empty(@(new Request())->realGet($key));
    }

    public static function all()
    {

        return (new Request())->realAll();


    }

    public static function json($data,$response_code=200){

        http_response_code($response_code);
        return json_encode($data);
    }

    public function realGet($key)
    {
        if($this->server_object['request_method']=='POST'){
            return $_POST[$key];
        }

        if($this->server_object['request_method']=='GET'){
            return $_GET[$key];
        }
        @parse_str(@$this->server_object['query_string'], $output);

        return @$output[$key];
    }

    public function realAll()
    {
        if($this->server_object['request_method']=='POST'){
          return $_POST;
        }

        if($this->server_object['request_method']=='GET'){
           return $_GET;
        }
        @parse_str(@$this->server_object['query_string'], $output);
        return $output;
    }

}
