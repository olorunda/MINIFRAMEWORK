<?php


namespace App\Controllers;
use App\Request\Request;
use App\View\HtmlView;
use Illuminate\Database\Capsule\Manager;

class HomeController
{

    public function index(){

        $users=Manager::table('users')->get();
        return HtmlView::view('home',['users'=>$users]);
    }


    public function admin(){
        $id= Request::get('id');

        return 'I am admin '.$id;
    }
}
