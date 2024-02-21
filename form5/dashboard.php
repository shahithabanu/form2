<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// Check user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

//user registration in session 

if (isset($_SESSION["userRegistrations"])) {
    echo "<h2>User Registrations</h2>";

    // Loop through each user registration in the array
    foreach ($_SESSION["userRegistrations"] as $user) {
        echo "<p>Username: " . $user['username'] ."<br>Password: " . $user['password'] . "<br>Email: " . $user['email'] . "</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to the Dashboard</h2>


    <p><a href="logout.php">Logout</a></p>
</body>
</html>
