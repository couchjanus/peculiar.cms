<?php
$con = mysqli_connect('localhost', 'root', '', 'shop');
if(!$con){   
    echo mysqli_connect_error();
    exit();
} else{
    
// $sql = "INSERT INTO guestbook(name, email, message) VALUES('Bad Dog', 'dog@my.cat', 'Hello doggy');";

$sql = "SELECT * FROM guestbook";
    $result = mysqli_query($con, $sql) or die("Error selecting rows".mysqli_error($con));
    echo "Rows selected Successfully";

    // while($row = mysqli_fetch_assoc($result)){
    //     var_dump($row);
    // }
    var_dump(mysqli_fetch_all($result, MYSQLI_ASSOC));
}
