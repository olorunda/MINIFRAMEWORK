<?php

namespace App\CoreClasses\Migration;
use App\CoreClasses\Logger\Logger;

class Migrate
{
    public $log;
    public function __construct()
    {
        $this->log=(new Logger());
    }

    public  function migrate(){

        $migrations=glob(BASEPATH.'/app/Migration/*');
        foreach($migrations as $migration){
           $this->executeMigration($migration);
        }

    }

    public  function rollback(){

        $migrations=glob(BASEPATH.'/app/Migration/*');
        foreach($migrations as $migration){
           $this->executeMigration($migration,'down');
        }

    }

    private final function executeMigration($migration,$type='up')
    {

        $name_base=str_replace('.php','',basename($migration));

        $this->log->info( $type=='up' ? 'Migrating' : 'Rolling Back '.$name_base);
        $name="\\App\\Migration\\$name_base";
        (new $name())->$type();
        $this->log->info( $type=='up' ? 'Migrated' : 'Rolled Back '.$name_base);


    }
}
