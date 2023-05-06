<?php


namespace App\Request;


class MiddleWare
{

    public function __call($name, $arguments)
    {
        if(!function_exists($name)){
            throw new \Exception('Middleware '.$name.' not Defined');
        }
        $this->$name();
    }

    public function onlyAdmin(){
        exit('You are not allowed to access this route');
    }
}
