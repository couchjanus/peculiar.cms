<?php
namespace Core;

use App\Models\{User, Role};

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

        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
        }
        
    }

    public function redirect($location=""){
        header("Location: http://".$_SERVER['HTTP_HOST']. $location);
        exit();
    }

    public function session(){
        return Session::instance();
    }

    public function auth(){
        return $this->user ? true:false;
    }

    public function role(){
        if($this->auth()){
            $role = (new Role)->getByPK($this->user->role_id);
            return  $role->name;
        }
    }
}
