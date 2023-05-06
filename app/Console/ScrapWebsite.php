<?php


namespace App\Console;

use App\CoreClasses\Logger\Logger;
class ScrapWebsite
{
    public  $log;
    public function __construct()
    {
        $this->log=(new Logger());
    }


    public function handle(){
        $this->log->info('I am a console Command');
    }


}
