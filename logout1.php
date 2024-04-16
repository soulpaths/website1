<?php
session_start();

// Clear all session variables
$_SESSION = array();

// If you want to destroy the session completely, including the session ID, you can uncomment the next line:
// session_destroy();

// Remove session cookie by setting its expiration time in the past
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Redirect the user to the login page or home page
header("Location: login.php"); // Change "login.php" to the appropriate URL
exit();
?>
