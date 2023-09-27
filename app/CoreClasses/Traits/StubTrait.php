<?php

namespace App\CoreClasses\Traits;

use App\CoreClasses\Logger\Logger;

trait StubTrait
{
    private  function generateStub($stub_name,$type)
    {
        $type=rtrim($type,'s');
        (new Logger())->info('Creating  ' . $stub_name . ', Please Wait...');
        $stub = file_get_contents(BASEPATH . "/app/CoreClasses/Stubs/{$type}Stub");

        $stub_file_name=strtolower($type);
        $stub_file = str_replace("#{$stub_file_name}name", ($stub_name), $stub);

        if (file_exists(BASEPATH . "/app/{$type}s/" . ($stub_name) . 'php')) {
            return
                (new Logger())->error( $type . $stub_name . ' Already  Exist');
        }

        if(!is_dir(BASEPATH . "/app/{$type}s")){
                mkdir(BASEPATH . "/app/{$type}s");
        }

        $fp = fopen(BASEPATH . "/app/{$type}s/" . ($stub_name) . '.php', 'w');
        fwrite($fp, $stub_file);
        fclose($fp);
        (new Logger())->info("$type "  . $stub_name . ' Created Successfully');
    }

}
