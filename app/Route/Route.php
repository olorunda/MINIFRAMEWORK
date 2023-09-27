<?php

namespace App\Route;
use App\CoreClasses\Request\Route;


Route::get('/allUser','HomeController@index');
Route::get('/admin/user','HomeController@admin',['middleware'=>['useronly']]);







