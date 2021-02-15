<?php

class ContactController
{
    public function index()
    {
        $title =  "Admin Contact";
        $data = [];
        $data = conf('contact');

        $url = ROOT.'/config/contact.json';

        if($_POST){
            if(!$_POST['email'] or !$_POST['street'] or !$_POST['city'] or !$_POST['country'] or !$_POST['mobile']){
                echo "Please, complete all fields";
            } else{
                $formdata = [
                    "email"=> $_POST['email'],
                    "country"=> $_POST['country'],
                    "city" => $_POST['city'],
                    "street" => $_POST['street'],
                    "mobile" => $_POST['mobile']
                ];

                $json = json_encode($formdata);

                if(file_put_contents($url, $json)){
                    $redirect = "http://".$_SERVER['HTTP_HOST']."/contact";
                    header("Location: $redirect");
                    exit();
                } else {
                    echo "Error";
                }

            }
        }
        render('admin/contact/index', ['title'=>$title, 'data'=>$data], 'admin');
    }

    public function list(){
        $con = mysqli_connect('localhost', 'root', '', 'shop') or die(mysqli_connect_error());

        $sql = "SELECT * FROM guestbook";
        $result = mysqli_query($con, $sql) or die("Error selecting rows".mysqli_error($con));
        $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        render('admin/contact/list', ['title'=>"All Messages", 'messages'=>$messages], 'admin');
    }
}


