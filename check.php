<?php

$host = "localhost";
$user = "root";
$password = "";
$DatabaseName = "baraero_may angel";

$connection = new mysqli($host, $user, $password, $DatabaseName);

$query = "SELECT * FROM username_password";
$result= mysqli_query($connection, $query);

$username = $_POST['username'];
$password = $_POST['password'];

while ($row = mysqli_fetch_array($result)) {

if ($username == $row['username'] && $password == $row['password']) {
    echo "<script>alert('Correct')</script>";
    header('location: home.php');
} else {
        echo "<script>
        alert('Incorrect');
        window.location='index.php'
        </script>";
}
}
?>
