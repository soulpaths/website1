<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);

if($conn->connect_error) {
    die("connection to database failed:" . $conn->connect_error);
}
$sql = "CREATE DATABASE cseDB";
if($conn->query($sql) === true){
    echo("Database created successfully");
} else {
    echo("Database not created");
}


?>