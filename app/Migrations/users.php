<?php

namespace App\Migrations;
use Illuminate\Database\Capsule\Manager as Capsule;

class users {

    public function up(){
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
        });
    }

    public function down(){
        Capsule::schema()->dropIfExists('users');
    }

}




