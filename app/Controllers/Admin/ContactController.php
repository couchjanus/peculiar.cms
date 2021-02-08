<?php

echo "Admin Contact";

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
?>

<form method="POST" action="">
    <div>
    <label>Email:  
    <input type="email" name="email" value="<?=$data['email']?>">
    </label>
    </div>
    
    <div>
    <label>Street:  
    <input type="text" name="street" value="<?=$data['street']?>">
    </label>
    </div>

    <div>
    <label>City:  
    <input type="text" name="city" value="<?=$data['city']?>">
    </label>
    </div>

    <div>
    <label>Country:  
    <input type="text" name="country" value="<?=$data['country']?>">
    </label>
    </div>
    <div>
    <label>Mobile:  
    <input type="text" name="mobile" value="<?=$data['mobile']?>">
    </label>
    </div>
    <div><input type="submit"></div>
</form>