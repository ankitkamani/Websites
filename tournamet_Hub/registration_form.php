<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
    <div class="form-floating mb-3">
        <label for="floatingInput">Email address</label><br>
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>

    </div>
    <div class="form-floating"><br>
        <label for="floatingPassword">Password</label><br>
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <br><br>
        <input type="submit" name="submit" class="form-control" id="floatingPassword" placeholder="submit">

        <a href='login.php'>alredy have an account...</a>; 
    
    </div>
    </form>
</body>

</html>

<?php

include 'mysql.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO login(email,password) VALUES('$email','$password')";
$a = mysqli_query($conn,$sql);
if($a){
    
    header('Location: login.php');
    
}else{
    echo 'error' . mysqli_error($conn) ;
}

}

?>

