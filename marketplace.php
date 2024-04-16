<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center">
        <h1>Welcome to the Marketplace</h1>
        
        <!-- Create buttons for Sell Products and Buy Products -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="seller_process.php" method="get">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Sell Products
                    </button>
                </form>
            </div>
            
            <div class="col-md-6">
                <form action="buyer_process.php" method="get">
                    <button type="submit" class="btn btn-success btn-lg">
                        Buy Products
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- Add logout button -->
<div class="mt-5">
    <?php
    if (isset($_SESSION['uname'])) {
        echo "<form action='logout1.php' method='post'>";
        echo "<button type='submit' class='btn btn-danger btn-lg'>Logout</button>";
        echo "</form>";
    } else {
        echo "<a href='logout1.php' class='btn btn-primary btn-lg'>Logout</a>";
    }
    ?>
</div>
    <!-- Add Bootstrap JS for proper button styling and functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start();

// Define the expected username and password
$expected_uname = "root"; // Replace "admin" with the expected username
$expected_pwd = ""; // Replace "password" with the expected password

// Check if the user is logged in
if (isset($_SESSION['uname'])) {
    echo "<br><a href='logout1.php'><input type='button' value='Logout1' name='logout'></a>";
} else {
    // Check if the form has been submitted
    if (isset($_POST['uname']) && isset($_POST['pwd'])) {
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        
        // Validate username and password
        if ($uname === $expected_uname && $pwd === $expected_pwd) {
            // Store username in the session
            $_SESSION['uname'] = $uname;
            // Redirect to marketplace page
            header("Location: marketplace.php");
            exit();
        } else {
            // Display an alert and redirect to login page
            echo "<script>alert('Username or password incorrect!');</script>";
            header("Location: login.php");
            exit();
        }
    }
}
?>
