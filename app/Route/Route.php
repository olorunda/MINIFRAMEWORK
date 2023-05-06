<?php

namespace App\Route;
use App\CoreClasses\Request\Request;
use App\CoreClasses\Request\Route;
use App\CoreClasses\Request\Route as Route2;


$path=Route::getRoute();

if($path=='/allUser' || $path=='/'){
   return  Route2::get('/allUser','HomeController@index');
}

if($path=='/admin/user'){
   return  Route2::get('/admin/user','HomeController@admin');
}







