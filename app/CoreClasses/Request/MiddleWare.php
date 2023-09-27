<?php


namespace App\CoreClasses\Request;


use App\CoreClasses\Traits\JsonResponse;

class MiddleWare
{
    use JsonResponse;

    public function __call($name, $arguments)
    {
        if(!function_exists($name)){
            throw new \Exception('Middleware '.$name.' not Defined');
        }
        $this->$name();
    }


}
