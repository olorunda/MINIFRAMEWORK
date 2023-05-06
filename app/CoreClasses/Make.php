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
        $this->generateStub($command_name,'Console');
    }

    public function MiddleWare($command_name)
    {
        $this->generateStub($command_name,'MiddleWare');
    }





}
