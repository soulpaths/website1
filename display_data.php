<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login_register';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection to database failed"  . $conn->connect_error);
}

$sql ="SELECT firstname,lastname,email from MyStudents ";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr><td>" . $row["firstname"]." ". $row["lastname"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
}else{
    echo "0 result";
}
$conn->close();
?>