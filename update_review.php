<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'eduard';
$DATABASE_PASS = '#eduarD123';
$DATABASE_NAME = 'movie_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$id = $_SESSION['id'];

$sql = "SELECT F.nume_film FROM film F 
            JOIN review R ON F.id_film = R.id_film
            WHERE R.id_utilizator = '$id'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>

    <link rel="stylesheet" type="text/css" href="logged_in_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>The new IMDb</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class="content">
    <h2>Profile Page</h2>
    <div>

        <form action="update_review2.php" method="post">
            <p>Update the review of the following movie:</p>
            <select name="selected_review" id='selected_pcid'">

                <?php

                while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                    $value= $rows['nume_film'];
                    ?>
                    <option value="<?= $value?>"><?= $value?></option>
                <?php }
                ?>
            </select>
            <p>
                <input type="submit" name="" value="Modify the review">
            </p>
        </form>

    </div>
</div>


</body>
</html>
