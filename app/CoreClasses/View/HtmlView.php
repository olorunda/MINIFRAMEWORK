<?php

namespace App\CoreClasses\View;
class HtmlView
{

    public static function view($html_view,$data){

        extract($data, EXTR_PREFIX_SAME, "wddx");
        $html= include BASEPATH.'/resources/'.$html_view.'.php';
        return $html;
    }


}
