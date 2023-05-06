<?php


namespace App\CoreClasses\Request;


class MiddleWare
{

    public function __call($name, $arguments)
    {
        if(!function_exists($name)){
            throw new \Exception('Middleware '.$name.' not Defined');
        }
        $this->$name();
    }


}
