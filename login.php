<?php
// Require DataBase Connection
require('Database/DBController.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>
<div class = "loginbox">
    <img src="./imagini/batman-icon.jpeg" class="avatar">
    <h1>Login Here</h1>
    <form action = 'login_check.php' method="POST">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username" id="username" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password" id = "password" required >
        <input type="submit" name="" value="Login">
        <a href="registration.php">Don't have an account?</a>
    </form>
</div>
</body>
</html>