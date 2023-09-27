<?php


namespace App\CoreClasses;


use App\CoreClasses\Traits\StubTrait;

class Make
{

    use StubTrait;
    public function Controller($stub_name)
    {

        $this->generateStub($stub_name,'Controllers');
    }


    public function Command($command_name)
    {
        $this->generateStub($command_name,'Consoles');
    }

    public function MiddleWare($command_name)
    {
        $this->generateStub($command_name,'MiddleWares');
    }

    public function Migration($command_name)
    {
        $this->generateStub($command_name,'Migrations');
    }

    public function UpdateMigration($command_name)
    {
        $this->generateStub($command_name,'MigrationUpdates');
    }

    public function Model($command_name)
    {
        $this->generateStub($command_name,'Models');
        $this->generateStub(strtolower($command_name).'s','Migrations');
    }





}
