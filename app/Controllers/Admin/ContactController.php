<?php

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
