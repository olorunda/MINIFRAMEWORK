<?php

namespace App\Route;
use App\Request\Request;
use App\Request\Route as Route2;


$path=(new Request())->request()->path_info;

if($path=='/allUser'){
   return  Route2::get('/allUser','HomeController@index');
}

if($path=='/admin/user'){
   return  Route2::get('/admin/user','HomeController@admin');
}







