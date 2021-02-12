<?php
$address = conf('contact');

$con = mysqli_connect('localhost', 'root', '', 'shop') or die(mysqli_connect_error());

function sanitize_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function load($data){
    foreach ($_POST as $key => $value) {
        if(array_key_exists($key, $data)){
            $data[$key]['value'] = trim($value);
        }
    }
    return $data;
}

function validate($rules){
    $errors = '';
    foreach ($rules as $key => $value) {
       if($rules[$key]['required'] && empty($rules[$key]['value'])){
           $errors .=  "<li>Please Complete field {$key}</li>";
       }
       if(array_key_exists('min', $rules[$key]) && (mb_strlen($rules[$key]['value']) < $rules[$key]['min'])){
        $errors .=  "<li>Too few Characters in the field {$key}</li>";
        }
        
    }
    if(!filter_var($rules['email']['value'], FILTER_VALIDATE_EMAIL)){
        $errors .=  "<li>Wrong Email field</li>";
    }
    return $errors;
}
if (!empty($_POST)){

    $rules = [
        'name' => [
            'required' => 1,
            'min' => 3,
        ],
        'email' => [
            'required' => 1,
        ],
        'message' => [
            'required' => 1,
        ],
    ];

    $rules = load($rules);
    if($errors = validate($rules)){
        render('errors/index', ['errors'=>$errors, 'title'=>"Errors Page"]);
    }else{
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $name = sanitize_input($name);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = sanitize_input($email);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $message = sanitize_input($message);

        $sql = "INSERT INTO guestbook(name, email, message) VALUES('$name', '$email', '$message');";
        $result = mysqli_query($con, $sql) or die("Error inserting row".mysqli_error($con));
    }
    
}

$sql = "SELECT * FROM guestbook";
$result = mysqli_query($con, $sql) or die("Error selecting rows".mysqli_error($con));
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

render('contact/index', ['address'=>$address, 'messages'=>$messages]);