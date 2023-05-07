<?php


namespace App\CoreClasses\Traits;



trait Session
{


    public final static function all()
    {
        return $_SESSION;
    }

    public static final function put($session_name, $value)
    {
        $_SESSION[$session_name] = $value;
    }

    public final static function get($session_name)
    {
        if(isset($_SESSION[$session_name])){
            return $_SESSION[$session_name];
        }


    }

    public final static function destroy($session_name)
    {
        if(isset($_SESSION[$session_name])) {
            unset($_SESSION[$session_name]);
        }

    }

}
