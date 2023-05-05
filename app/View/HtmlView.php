<?php

namespace App\View;
use App\Request\Request;
class HtmlView
{

    public static function view($html_view,$data){

        extract($data, EXTR_PREFIX_SAME, "wddx");
        $html= include $_SERVER['DOCUMENT_ROOT'].'/resources/'.$html_view.'.php';
        return $html;
    }


}
