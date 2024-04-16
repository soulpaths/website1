<?php
session_start();

// Check if a user is logged in
if (isset($_SESSION['uname'])) {
    // Clear session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, directly redirect them to the login page
    header("Location: login.php");
    exit();
}
?>
