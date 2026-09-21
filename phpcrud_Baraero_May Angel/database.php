<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud_baraero_may_angel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>