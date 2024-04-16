<?php
// Include the database connection file
include 'connection.php';

// Retrieve seller data from the database using a prepared statement
$stmt = $conn->prepare("SELECT first_name, last_name, product_types, price, date, time, year, contact, address, village_town_district, state, country FROM sellers");
$stmt->execute();
$result = $stmt->get_result();

// Check if there is any data
if ($result->num_rows > 0) {
    // Loop through each seller record and display it
    while ($row = $result->fetch_assoc()) {
        echo "<div class='seller-profile'>";
        echo "<p><strong>Name:</strong> " . $row['first_name'] . " " . $row['last_name'] . "</p>";
        echo "<p><strong>Product Types:</strong> " . $row['product_types'] . "</p>";
        echo "<p><strong>Price:</strong> " . $row['price'] . "</p>";
        echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
        echo "<p><strong>Time:</strong> " . $row['time'] . "</p>";
        echo "<p><strong>Year:</strong> " . $row['year'] . "</p>";
        echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
        echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
        echo "<p><strong>Village/Town/District:</strong> " . $row['village_town_district'] . "</p>";
        echo "<p><strong>State:</strong> " . $row['state'] . "</p>";
        echo "<p><strong>Country:</strong> " . $row['country'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No seller data found.</p>";
}

// Close the statement and the database connection
$stmt->close();
close_connection($conn);
?>
