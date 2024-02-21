<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // array to store user registrations
    $userRegistrations = [];

    // value already exists

    if (isset($_SESSION["userRegistrations"])) {

        // If it exists use the existing array

        $userRegistrations = $_SESSION["userRegistrations"];
    }

    // Add the current registration 

    $userRegistrations[] = [
        'username' => $username,
        'password' => $password,
        'email' => $email
    ];

    // updated array
    $_SESSION["userRegistrations"] = $userRegistrations;

    header("Location: 1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <form action="" method="post">
        <h1>Registration Form</h1>
        Username : <input type="text" name="username" required><br><br>
        Password : <input type="password" name="password" required><br><br>
        Email : <input type="email" name="email" required><br><br>
        <button type="submit">Register</button><br><br>
    </form>
</body>
</html>


