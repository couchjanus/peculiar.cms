<?php
require_once ROOT."/core/Request.php";
require_once ROOT."/core/Response.php";
require_once ROOT."/core/Session.php";

class BaseController 
{
    public $response;
    public $request;
    protected $logged_in = false;
    protected $user_id = null;
    public $user = null;
    protected $error = null;
    protected $message = null;

    public function __construct(Response $response=null, Request $request=null)
    {
        $this->response = $response ?? new Response();
        $this->request = $request ?? new Request();
        
    }

    public function redirect($location=""){
        header("Location: http://".$_SERVER['HTTP_HOST']. $location);
        exit();
    }

    public function session(){
        return Session::instance();
    }
}
