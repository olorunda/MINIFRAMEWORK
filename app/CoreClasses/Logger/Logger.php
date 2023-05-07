<?php

namespace App\CoreClasses\Logger;



final class Logger
{

    public function __call($method_name, $args) {
        $this->log($method_name,$args[0]);
    }

    public function log($type,$text){
        $text=$this->writeTextBasedOnErrorType($type,$text);
        if(!is_dir(BASEPATH . "/logs")){
            mkdir(BASEPATH . "/logs");
        }
        $fp = fopen(BASEPATH.'/logs/'.date('Ymd').'.log', 'a');//opens file in append mode
        fwrite($fp, $text."\n");
        fclose($fp);
        if($type=='message'){
            return $this;
        }
        echo "$text\n";
    }

    private function writeTextBasedOnErrorType($type, $text)
    {
            return date('Y-m-d H:i:s')." $type::".$text;
    }
}
