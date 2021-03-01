<?php

require_once APP.'/Models/User.php';
require_once ROOT.'/core/BaseController.php';

class RegisterController extends BaseController
{
    private $costs = [
        'cost' => 12
    ];

    public function signup(){

        $password = $this->request->input['password'];
        $confirmpassword = $this->request->input['confirmpassword'];

        if ($this->is_valid_password($password, $confirmpassword)){
            [$name, $domain] = explode('@', $this->request->input['email']);
            $hash = password_hash($password, PASSWORD_BCRYPT, $this->costs);
            (new User)->save(['name'=>$name, 'email'=>$this->request->input['email'],'password'=>$hash]);
            $this->redirect('/#login');
        }else{
            $this->redirect('/#register');
        }

    }

    private function is_valid_password($password, $confirm) 
    {
        if($password != $confirm) {
            return false;
        }
        return true;
    }
}