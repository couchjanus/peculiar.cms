<?php

define('ROOT', dirname(__DIR__));
require_once ROOT.'/config/app.php';


function setLogging(){
    if(APP_ENV === 'dev'){
        ini_set("desplay_startup_errors", 1);
        error_reporting(-1);
        ini_set("desplay_errors", 1);
    } else{
        error_reporting(E_ALL & ~E_NOTICE);
        ini_set("desplay_errors", 0);
    }
    ini_set("log_errors", 1);
    ini_set("error_log", LOGS.'/errors.log');
}


function init(){
    if (function_exists('date_default_timezone_set')) {
        date_default_timezone_set("Europe/Kiev");
    }
    
    setlocale(LC_ALL, "uk_UA");
    setLogging();
}

init();

function includeWithVars($file, $params=[]){
    extract($params);
    include_once $file;
}

function conf($mix):array{
    $url = ROOT."/config/$mix.json"; 
    if(file_exists($url)){
        $json = file_get_contents($url);
        // debug_print_backtrace();
        return json_decode($json, true);
    } else{
        echo "File $mix.json does not exists";
        return [];
    }
}

function isGuest(){
    if(isset($_SESSION['Logged'])){
        return false;
    }
    return true;
}

function load($file){
    if(is_file($file)){
        include_once $file;
    }
}

spl_autoload_register(function($class){
    $parts = explode('\\', $class);
    $classDirs = ['/core/', '/app/Models/', '/app/Controllers/', '/app/Controllers/Admin/'];
    foreach ($classDirs as $classDir) {
        load(ROOT.$classDir.end($parts).".php");
    }
});

use Core\{Session, Router, Request};

Session::instance();

$router = new Router(new Request());
$router->run();