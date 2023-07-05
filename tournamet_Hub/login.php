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

    </div>
    </form>
</body>

</html>

<?php
session_start();
include 'mysql.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password = $_POST['password'];





$sql = "SELECT *FROM login WHERE email = '$email' and password = '$password'";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
    echo "<h1><center> Login successful </center></h1>";  
    $_SESSION["email"] = $email;
    header('Location: index.php');


}  
else{  
    echo "<h1> Login failed. Invalid username or password.</h1>";  
}     

}

?>