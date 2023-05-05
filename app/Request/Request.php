<?php


namespace App\Request;

class Request
{

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

    public static function all()
    {

        return (new Request())->realAll();


    }

    public static function json($data){

        return json_encode($data);
    }

    public function realGet($key)
    {

        parse_str(@$this->server_object['query_string'], $output);

        return @$output[$key];
    }

    public function realAll()
    {
        parse_str(@$this->server_object['query_string'], $output);
        return $output;
    }

}
