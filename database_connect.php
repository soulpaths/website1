<?php
$servername = "localhost";
$username = "root";
$password = ""; // Add your MySQL password if required
$database = "farm_easy"; // Update this line to match the name of your database

// Create a new MySQL connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    // Log the error instead of exposing it to the user
    error_log("Connection failed: " . $conn->connect_error);
    // Display a generic message to the user
    echo "An error occurred while connecting to the database. Please try again later.";
    // Exit the script if the connection failed
    exit();
}

// Function to close the database connection
function close_connection($conn) {
    // Close the database connection if it is still open
    if ($conn) {
        $conn->close();
    }
}

// At the end of your script, remember to close the connection using the close_connection function.
?>
