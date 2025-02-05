<?php
namespace app\controllers;
use \Controller;
use \Response;
use \DataBase;

class SessionController extends Controller
{
    public static function start($user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['expiration'] = time() + 10;
    }
    public static function reauth()
    {
        if (isset($_SESSION['expiration']) || $_SESSION['expiration'] < time()) {
            $_SESSION = array();
            session_destroy();
        }
    }
    public static function update($time = 20)
    {
        if (isset($_SESSION['expiration'])) {
            $_SESSION['expiration'] = time() + $time;
            session_regenerate_id(false);
        }
    }
}