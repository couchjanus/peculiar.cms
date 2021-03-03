<?php

require_once ROOT.'/core/Controller.php';
require_once ROOT.'/app/Models/User.php';
require_once ROOT.'/app/Models/Order.php';
require_once ROOT.'/app/Models/Product.php';

class ProfileController extends Controller
{
    protected static string $layout ='app';

    public function __construct()
    {
        parent::__construct();
        if($userId=$this->session()->get('userId')){
            $this->user = (new User)->getByPK($userId);
        }
    }

    public function index()
    {
       if(!$this->user){
           $this->redirect("/#login");
       }
       $sql = "SELECT * FROM orders WHERE user_id = ". $this->user->id. " ORDER BY id DESC"; 
    //    $sql = "SELECT * FROM orders ORDER BY id DESC"; 
       $orders = (new Order)->runSql($sql);
       $user = $this->user;
      
       $this->render('profile/index', compact('user', 'orders'));
    
    }

    
    
}