<?php


namespace App\CoreClasses\Traits;


trait JsonResponse
{

    public function json($data,$response_code=200){
        http_response_code($response_code);
        return json_encode($data);
    }

}
