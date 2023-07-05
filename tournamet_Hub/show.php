<?php
include 'mysql.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("loaction: login.php");
}
?>

<?php
if (isset($_POST['submit'])) {
    $email = $_SESSION['email'];
    // $id=$_GET['srno'];
    $deletequery = "DELETE FROM `tournament`.`matchdata` WHERE `matchdata`.`email` = '$email';";
    $s1 = mysqli_query($conn, $deletequery);
    if ($s1) {
        echo "<script>alert(`Match cancelled successfully...`)</script>";
    } else {
        echo "<script>alert(`Oops!!something went wrong!!! Please try again..`)</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>



    <?php
    $email = $_SESSION['email'];
    $selectquery = "SELECT * from `matchdata` where `matchdata`.`email`='$email' order by `id` ;";
    $result = mysqli_query($conn, $selectquery);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-hover'>";
        echo "<thead class='table-dark'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Email</th>";
        echo "<th scope='col'>UID</th>";
        echo "<th scope='col'>UserName</th>";
        echo "<th scope='col'>MatchType</th>";
        echo "<th scope='col'>Selected Game</th>";
        echo "<th scope='col'>Cancle Registration</th>";
        echo "</tr>";
        echo "</thead>";
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<table class='table table-hover'>";
        echo "<thead class='table-dark'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Email</th>";
        echo "<th scope='col'>UID</th>";
        echo "<th scope='col'>UserName</th>";
        echo "<th scope='col'>MatchType</th>";
        echo "<th scope='col'>Selected Game</th>";
        echo "<th scope='col'>Cancle Registration</th>";
        echo "</tr>";
        echo "</thead>"; 
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>";
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['uid'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['matchtype'] . "</td>";
        echo "<td>" . $row['gametype'] . "</td>";
        echo "<td>" .
            '<form method="POST">
            <button  type="submit" class="btn btn-danger" name="submit" value="Submit">Cancel</button>
            </form>' . "</td>";
        echo "</tr>";
    }
    echo '</table>';
    ?>


</body>

</html>