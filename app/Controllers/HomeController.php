<?php


namespace App\Controllers;
use App\CoreClasses\Controller\BaseController;
use App\CoreClasses\Request\Request;
use App\CoreClasses\Request\Session;
use App\CoreClasses\View\HtmlView;
use App\Models\User;
use Illuminate\Database\Capsule\Manager;

class HomeController extends BaseController
{

    public function __construct()
    {

//        $this->middleware('adminonly');
    }

    public function index(){

//        $users=Manager::table('users')->get();
        $users="I love me and i am runing on docker";
        return HtmlView::view('home',['users'=>$users]);
    }


    public function admin(){
        $id= Request::get('id');
        $users=User::all();
        return Request::json(['status'=>'success','data'=>$users],200);
    }
}
