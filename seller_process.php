<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmeasy";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM buyer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo "Product: " . $row["product"]. " - Price: " . $row["price"]. " - Date: " . $row["date"]. " - Time: " . $row["time"]. " - Name: " . $row["name"]. " - Contact: " . $row["contact"]. " - Address: " . $row["address"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<style>
#buyers-data {
    margin-top: 20px;
}

#buyers-data ul {
    list-style-type: none;
    padding: 0;
}

#buyers-data li {
    margin-bottom: 10px;
}
</style>