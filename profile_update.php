<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
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
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT parola, email, nume_utilizator, prenume_utilizator, data_inregistrarii, bio_utilizator FROM utilizator WHERE id_utilizator = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $surname, $name, $data, $bio);
$stmt->fetch();
$stmt->close();
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
        <p>Modify your details:</p>
        <form action="profile_update_2.php" method="post">
            <p>
                Username:
                <input name ="utilizator" type="text" value=<?=$_SESSION['name']?>
            </p>

            <p>
                Name:
                <input name ="name" type="text" value=<?=$name?>>
            </p>

            <p>
                Surname:
                <input name ="surname" type="text" value=<?=$surname?>>
            </p>

            <p>
                E-mail:
                <input name ="email" type="text" value=<?=$email?>>
            </p>

            <p>
                Registration date:
                <?=$data?>
            </p>

            <p>
                Bio:
                <input name = "bio" type="text" value="<?=$bio?>">

            </p>
            <p>
                <input type="submit" name="" value="Modify my info">
            </p>

        </form>
    </div>
</div>


</body>
</html>