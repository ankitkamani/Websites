<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bgmi page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include "nav.php";
    ?>

<?php

include 'mysql.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$uid = $_POST['uid'];
$username = $_POST['username'];
$match = $_POST['select'];


    $sql = "INSERT INTO `matchdata` (`id`, `email`, `uid`, `username`, `matchtype`, `gametype`) VALUES (NULL, '$email', '$uid', '$username', '$match', 'Ludo King')";
    $a = mysqli_query($conn,$sql);
    if($a){
        
        //  header('location: index.php');
        
        echo "<br><center><b><h1>Match Registration Successful</h1></b></center>";

    }else{
        echo 'error' . mysqli_error($conn) ;
    }


}
?>



<div class="container-fluid d-flex justify-content-center">

    <form action="" method="POST">

        <br><br>

        <div class="card text-dark bg-light mb-3"  style="max-width: 50rem;">
            <div class="card-header"><b><i>Match Registration Form</i></b></div>
            <div class="card-body">

            <div class="input-group  shadow-sm p-3 mb-3 bg-body rounded">
            <span class="input-group-text" id="inputGroup-sizing-default">Email address</span>
            <input type="text" name="email" value="<?php session_start();
                    echo $_SESSION['email'];
                    ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
        </div>

        <div class="input-group shadow-sm p-3 mb-3 bg-body rounded">
            <span class="input-group-text" id="inputGroup-sizing-default">Enter UID</span>
            <input type="number" name="uid" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <div class="input-group  shadow-sm p-3 mb-3 bg-body rounded">
            <span class="input-group-text" id="inputGroup-sizing-default">Enter User Name</span>
            <input type="text" name="username" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>

        <div class="input-group shadow-sm p-3 mb-3 bg-body rounded">
            <label class="input-group-text" name="select" for="inputGroupSelect01">Select Match Type</label>
            <select class="form-select" name="select" id="inputGroupSelect01" required>
                <!-- <option selected>Choose...</option> -->
                <option value="Erangle" name="Erangle" >Erangle</option>
                <option value="Miramar" name="Miramar">Miramar</option>
                <option value="Livik" name="Livik">Livik</option>
                <option value="TDM" name="TDM">TDM</option>
                <option value="Sniper Rifal" name="Sniper Rifal">Sniper Rifal</option>
            </select>
        </div>

        <div class="mb-3 form-check ">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                
            </div>
        </div>

    </form>
</div>
</body>

</html>
