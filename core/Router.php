<?php
namespace Core;

define('ROUTES', require_once ROOT.'/config/routes.php');

class Router 
{
    private $routes = ROUTES;
    public function __construct(Request $request)
    {
        $this->request = $request ?? new Request();
    }

    public function run(){
        if(array_key_exists($this->request->uri(), $this->routes)){
            return $this->init($this->routes[$this->request->uri()]);
        }else{
            foreach ($this->routes as $key => $value) {
                $pattern = "@^" . preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)',$key)."$@";
                
                preg_match($pattern, $this->request->uri(), $matches);
                array_shift($matches);
                
                if($matches){
                    $arr = $value;
                    $arr[] = $matches;
                    return $this->init(...$arr);
                }
            }
            return $this->init($this->routes['errors']);
        }   
    }

    private function init($path, $params=[]){
        [$controller, $action] = explode('@', $path);
        $controller = "\\App\Controllers\\".$controller;
        $controller = new $controller();
        return $controller->$action($params);
    }

}
