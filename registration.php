<?php
// Require DataBase Connection
require('Database/DBController.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="registration_style.css">
</head>
<body>
<div class = "loginbox">
    <img src="./imagini/batman-icon.jpeg" class="avatar">
    <h1>Create an account</h1>
    <form action ='registration_insert.php' method="post">
        <p>Introduce your name</p>
        <input type="text" name="prenume_utilizator" placeholder="Enter your name" required>
        <p>Introduce your surname</p>
        <input type="text" name="nume_utilizator" placeholder="Enter your surname" required>
        <p>Pick a username</p>
        <input type="text" name="username" placeholder="Enter your username" required>
        <p>Your e-mail</p>
        <input type="text" name="email" placeholder="Enter your e-mail address" required>
        <p>Pick a password</p>
        <input type="password" name="parola" placeholder="Enter Password" required>
        <input type="submit" name="" value="Create account">
    </form>
</div>
</body>
</html>


