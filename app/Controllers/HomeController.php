<?php


namespace App\Controllers;
use App\Request\MiddleWare;
use App\Request\Request;
use App\View\HtmlView;
use Illuminate\Database\Capsule\Manager;

class HomeController
{

//    public function __construct()
//    {
//        (new MiddleWare())->onlyAdmin();
//    }

    public function index(){

//        $users=Manager::table('users')->get();
        $users="I love me and i am runing on docker";
        return HtmlView::view('home',['users'=>$users]);
    }


    public function admin(){
        $id= Request::get('id');
        return 'I am admin '.$id;
    }
}
