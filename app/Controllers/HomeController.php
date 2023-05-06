<?php


namespace App\Controllers;
use App\CoreClasses\Controller\BaseController;
use App\CoreClasses\Request\Request;
use App\CoreClasses\View\HtmlView;
use Illuminate\Database\Capsule\Manager;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->middleware('adminonly');
    }

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
