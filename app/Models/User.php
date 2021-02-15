<?php

class User 
{
   // 
   public $username = "Default Name";
   protected $sex;
   private $age = 22;

   public function getAge(){
       return $this->age;
   }

   public function setAge($age){
        $this->age = $age;
    }
}


$user = new User;

var_dump($user->username);

$user->username = "Tom Cat";
var_dump($user->username);

$user1 = new User;
var_dump($user1);

echo get_class($user1);

// var_dump($user->sex);

var_dump($user->getAge());

$user->setAge(19);

var_dump($user->getAge());