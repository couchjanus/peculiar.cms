<?php
namespace App\Controllers;

use App\Models\User;

use Core\BaseController;

class LoginController extends BaseController
{ 

    public function signin(){
        if ($this->logged_id === true){
            $this->redirect('/profile');
        }

        $userId = $this->checkUser($this->request->input['email'], $this->request->input['password']);

        if($userId === false){
            $this->redirect('/#login');
        }else{
            $this->user = (new User)->getByPK($userId);
            $this->logged_in = true;
            $this->session()->set('userId', $this->user->id);
            $this->session()->set('Logged', $this->logged_in);
            $this->redirect('/profile');
        }
        
    }

    private function checkUser($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = (new User)->getWhere($sql);
        if (!$user){
            return false;
        }else{
            if(password_verify($password, $user->password)){
                return $user->id;
            }else{
                return false;
            }
        }
    }

    public function logout(){
        $this->session()->destroy();
        $this->logged_in = false;
        $this->redirect('/');
    }
}