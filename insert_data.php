<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_register';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection to database failed"  . $conn->connect_error);
}

$sql = "INSERT INTO users(firstname, lastname,email,pass) VALUES ('woxsen','uni', 'woxsen@gmail.com' , '123')" ;
if ($conn->query($sql) == true ){
    echo ("Inserted Data successfully!");
} else{ 
    echo ("The data is not inserted");
}