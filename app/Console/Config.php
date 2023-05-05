<?php


namespace App\Console;

use App\Logger\Logger;
use Symfony\Component\DomCrawler\Crawler;
use App\Request\Request;
class Config
{
    public  $log;
    public function __construct()
    {
        $this->log=(new Logger());
    }

    var $data_text=[];

    public function crawWebsite($url){

        $this->log->info('Processing Starting ...');
        $html=file_get_contents($url);
        $crawler = new Crawler($html);
        $crawler->filter('p')->each(function (Crawler $c) use(&$i) {
            $this->data_text[]=$c->text();
            $this->log->info('Processing Tag ...'.$i++);
        });

        $this->log->info('Processing Ended');
        $this->log->message(json_encode($this->data_text));
        $this->log->info(__METHOD__);
    }


    public function showInfo(){
        return Request::get('id');
    }

    public function adminUser()
    {
        return "I am Admin User";
    }


}
