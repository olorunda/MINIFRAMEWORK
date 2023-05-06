<?php


namespace App\MiddleWare;

use App\CoreClasses\Request\MiddleWare;

class adminonly extends MiddleWare
{

   public function run(){
        exit('Invalid Request');
   }

}
