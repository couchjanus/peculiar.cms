<?php

class Session 
{
    private static $instance = null;

    public function __construct()
    {
        session_start();
    }

    public static function instance(){
        if( self::$instance === null){
            self::$instance = new Session;
        }
        return self::$instance;
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return $_SESSION[$key] ?? false;
    }

    public static function unset($key){
        unset($_SESSION[$key]);
    }

    public static function destroy(){
        session_unset();
    }
}