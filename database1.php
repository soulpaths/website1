<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}

$sql = "CREATE TABLE manideep (id INT(6) AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(255) NOT NULL,   lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL,   email_address VARCHAR(255) NOT NULL, phone_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL)";
if($conn->query($sql) === true){
    echo("created the table successfully");
} else {
    echo("table not created successfully");
}