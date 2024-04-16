<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

require_once "connection.php"; // Include your connection script

if (isset($_POST["login"])) {
    // Get email and password from form
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validate that both email and password are provided
    if (empty($email) || empty($password)) {
        echo "<div class='alert alert-danger'>Please provide both email and password.</div>";
    } else {
        // Prepare SQL query to find user by email
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error in query: " . mysqli_error($conn));
        }

        // Fetch user data
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            // Verify password
            if (password_verify($password, $user["password"])) {
                // Set session variable for user login
                $_SESSION["user"] = "yes";
                header("Location: index.php");
                exit();
            } else {
                // Incorrect password
                echo "<div class='alert alert-danger'>Password does not match.</div>";
            }
        } else {
            // Email not found
            echo "<div class='alert alert-danger'>Email does not match.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="container">
        <!-- Form action is set to the current script -->
        <form action="" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p>Not registered yet? <a href="registration.php">Register Here</a></p>
        </div>
    </div>
</body>

</html>
