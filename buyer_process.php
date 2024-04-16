<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmeasy";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['product']) && isset($_POST['price']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['address'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $sql = "INSERT INTO buyer (product, price, date, time, name, contact, address)
    VALUES ('$product', '$price', '$date', '$time', '$name', '$contact', '$address')";

    if ($conn->query($sql) === TRUE) {
      echo "";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<div class="container">
	<title>FarmEasy</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>
    <div class="left-side">
        <h1 style="color: green; font-size: 110px;">Welcome To </h1>
        <h1 style="color: green; font-size: 110px;">FARM EASY</h1>
        </div>
        <div class="right-side">
	<div id="buyer-form" class="form">
		<h1>Buyer Information</h1>
		<form id="buyer-form-data">
			<label for="product">Product quantity</label><br>
			<input type="text" id="product" name="product"><br>
			<label for="productType">Product Type:</label><br>
			<select id="productType" name="productType">
				<option value="organicVegetables">Organic Vegetables</option>
				<option value="inorganicVegetables">Inorganic Vegetables</option>
				<option value="fruits">Fruits</option>
				<option value="grains">Grains</option>
				<option value="other">Other</option>
			</select><br>
			<label for="price">Price in rupees</label><br>
			<input type="number" id="price" name="price"><br>
			<label for="date"></label><br>
			<input type="date" id="date" name="date"><br>
			<label for="time"></label><br>
			<input type="time" id="time" name="time"><br>
			<label for="name">Name</label><br>
			<input type="text" id="name" name="name"><br>
			<label for="contact">Contact</label><br>
			<input type="text" id="contact" name="contact"><br>
			<label for="address">Address</label><br>
			<input type="text" id="address" name="address"><br>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="script.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
    $('#buyer').click(function(){
        $('.form').hide();
        $('#buyer-form').show();
    });

    $('#seller').click(function(){
        $('.form').hide();
        $('#seller-form').show();
    });

    $('#buyer-form-data').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'buyer_process.php',
            data: formData,
            success: function(data){
                console.log(data);
                $('#buyer-form')[0].reset();
            }
        });
    });

    $('#show-buyers').click(function(){
        $.ajax({
            type: 'GET',
            url: 'seller_process.php',
            success: function(data){
                console.log(data);
                var buyers = JSON.parse(data);
                var output = '<ul>';
                for(var i in buyers){
                    output += '<li>Product: ' + buyers[i].product + ' - Price: ' + buyers[i].price + ' - Date: ' + buyers[i].date + ' - Time: ' + buyers[i].time + ' - Name: ' + buyers[i].name + ' - Contact: ' + buyers[i].contact + ' - Address: ' + buyers[i].address + '</li>';
                }
                output += '</ul>';
                $('#buyers-data').html(output);
            }
        });
    });
});
</script>