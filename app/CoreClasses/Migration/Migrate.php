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

    public  function migrate($path=''){

        $migrations=glob(BASEPATH.'/app/Migrations/*');
        $migration_updates=glob(BASEPATH.'/app/MigrationUpdates/*');
        $migrations=array_merge($migrations,$migration_updates);

        if($path!=''){
            $this->executeMigration(BASEPATH.'/app/Migrations/'.$path);
            $this->executeMigration(BASEPATH.'/app/MigrationUpdates/'.$path);
            return;
        }

        foreach($migrations as $migration){

           $this->executeMigration($migration);
        }

    }

    public  function rollback(){

        $migrations=glob(BASEPATH.'/app/Migrations/*');
        foreach($migrations as $migration){
           $this->executeMigration($migration,'down');
        }

    }

    private function executeMigration($migration,$type='up')
    {

        $name_base=str_replace('.php','',basename($migration));

        $this->log->info( $type=='up' ? 'Migrating' : 'Rolling Back '.$name_base);
        $migration_folder=str_contains($migration,'MigrationUpdates') ? 'MigrationUpdates' : 'Migrations';
        $name="\\App\\$migration_folder\\$name_base";

        (new $name())->$type();
        $this->log->info( $type=='up' ? 'Migrated' : 'Rolled Back '.$name_base);

    }
}
