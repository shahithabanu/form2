<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginusername = $_POST["username"];
    $loginpassword = $_POST["password"];

    // Check session variable exists
    if (isset($_SESSION["userRegistrations"])) {

        // Loop through each user registration in the array
        foreach ($_SESSION["userRegistrations"] as $user) {

            // Check if the entered username and password match
            if ($user['username'] == $loginusername && $user['password'] == $loginpassword) {
                $_SESSION['loggedin'] = true;  // Set thr variabel of user logged in
                $loginSuccess = true; //login success message
                break;
            }
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
