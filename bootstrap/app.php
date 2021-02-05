<?php

define('ROOT', dirname(__DIR__));
require_once ROOT.'/config/app.php';



function render($view, $params=null){
    ob_start();
    $content = renderView($view, $params);
    require_once VIEWS.'/layouts/app.php';
    
    echo str_replace('{{content}}', $content, ob_get_clean());
    
}
function renderView($view, $params){
    if ($params){
        extract($params);
    }
    ob_start();
    require_once VIEWS."/$view.php";
    return ob_get_clean();
}


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

// error_log("Hello Log");

function uri(){
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    // var_dump(debug_backtrace());
    // debug_print_backtrace();
    return trim($uri, '/') ?? '';
}

$routes = require_once ROOT.'/config/routes.php';
$response = false;
foreach ($routes as $key => $value) {
    if ($key == uri()){
        include_once CONTROLLERS."/${value}"; 
        $response = true;
         break;
    }
}

if(!$response){
    $msg = "<h1>404: Oops, Page not found!</h1>";
    echo $msg;

    // var_dump(debug_backtrace());
    debug_print_backtrace();
    error_log($msg);
}