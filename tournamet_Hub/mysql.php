<?php

$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'tournament';

$conn = mysqli_connect($server_name,$user_name,$password,$db_name);

if($conn == true){

    // echo "success";
}
else{
    echo "error".mysqli_error();
}

?>