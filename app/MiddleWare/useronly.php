<?php


namespace App\MiddleWare;

use App\CoreClasses\Request\MiddleWare;

class useronly extends MiddleWare
{

   public function run(){
        exit('Invalid Request');
   }

}
