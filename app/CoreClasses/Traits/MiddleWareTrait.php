<?php


namespace App\CoreClasses\Traits;


use App\CoreClasses\Request\MiddleWare;

trait MiddleWareTrait
{

    public function middleware($perm){

        if(is_array($perm)){
            $perm=isset($perm['middleware']) ?  $perm['middleware'] : $perm;
            foreach($perm as $per){

                $middlewarename="App\\MiddleWare\\$per";
                $middleware=(new $middlewarename());
                $middleware->run();
            }
            return;
        }
        $middlewarename="App\\MiddleWare\\$perm";
        (new $middlewarename())->run();
    }



}
