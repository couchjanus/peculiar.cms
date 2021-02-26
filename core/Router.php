<?php

require_once ROOT.'/core/Request.php';
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
            return $this->init(...$this->searchController($this->routes[$this->request->uri()]));
        }else{
           
            foreach ($this->routes as $key => $value) {
                $pattern = "@^" . preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)',$key)."$@";
                
                preg_match($pattern, $this->request->uri(), $matches);
                
                array_shift($matches);
                
               
                if($matches){
                   
                    $arr = $this->searchController($value);
                    
                    $arr[] = $matches;
                    // print_r($arr);
                    return $this->init(...$arr);
                }
            }
        }
        include_once CONTROLLERS . "/ErrorController.php";
            return (new ErrorController())->errors(['errors'=>"<li>Page Not Found</li>",
            'title'=>"Ooops! Eroor Page"]);
    }

    private function searchController(string $path):array{
        $segments = explode('\\', $path);
        // list($controller, $action) = explode('@', array_pop($segments))
        [$controller, $action] = explode('@', array_pop($segments));
        $prefix = DIRECTORY_SEPARATOR;
        foreach ($segments as $segment) {
            $prefix .= $segment.DIRECTORY_SEPARATOR;
        }
        return [$prefix, $controller, $action];
    }

    private function init($path, $controller, $action, $params=[]){
        $path = CONTROLLERS . $path . $controller . '.php';
        try{
            include_once $path;
            $controller = new $controller();
        }catch(Exception $e){
            include_once CONTROLLERS . "/ErrorController.php";
            return (new ErrorController())->errors($e->getMessage());
        }
        try{
            return $controller->$action($params);
        }catch(Exception $e){
            include_once CONTROLLERS . "/ErrorController.php";
            return (new ErrorController())->errors($e->getMessage());
        }

    }

}
