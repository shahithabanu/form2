<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginusername = $_POST["username"];
    $loginpassword = $_POST["password"];

    // Check if the session variable exists
    if (isset($_SESSION["userRegistrations"])) {
        $userRegistrations = $_SESSION["userRegistrations"];

        // Search for the entered username in the array
        $index = array_search($loginusername, array_column($userRegistrations, 'username'));

        
        if ($index !== false && $userRegistrations[$index]['password'] == $loginpassword) {
            $_SESSION['loggedin'] = true;
            $loginSuccess = true;
        }
    }

    if (!isset($loginSuccess)) {
        $error = "Invalid Username and Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (isset($loginSuccess)) : ?>
        <h3>Login Successful!</h3>

        <?php
        // Display user details using the $index
        $userDetails = $userRegistrations[$index];
        echo "<p>Username: " . $userDetails['username'] . "<br>Email: " . $userDetails['email'] . "</p>";
        ?>

        <?php header("refresh:2;url=dashboard.php");  ?>
    <?php else : ?>
        <form action="" method="post">
            Username : <input type="text" name="username" required><br><br>
            Password : <input type="password" name="password" required><br><br>
            <button type="submit">Login</button><br><br>
        </form>
    <?php endif; ?>
</body>
</html>
