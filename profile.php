<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: logged_in.php');
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
    <link rel="stylesheet" type="text/css" href="tables_style.css">
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
        <p>Your account details are the following:</p>
        <table>
            <tr>
                <td>Username:</td>
                <td><?=$_SESSION['name']?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?=$name?></td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><?=$surname?></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><?=$email?></td>
            </tr>
            <tr>
                <td>Registration date:</td>
                <td><?=$data?></td>
            </tr>
            <tr>
                <td>Bio:</td>
                <td><?=$bio?></td>
            </tr>
        </table>
    </div>
    <div>
        <h4> User Operations</h4>
        <button> <a href="profile_update.php"> Update your details</a> </button>
        <button> <a href="delete_profile.php"> Delete your account</a> </button>

    </div>
    <div>
        <h4> Review Operations</h4>
        <button> <a href="see_review.php"> See your reviews</a> </button>
        <button> <a href="add_review.php"> Add review</a> </button>
        <button> <a href="update_review.php"> Update review</a> </button>
        <button> <a href="delete_review.php"> Delete review</a> </button>
    </div>
</div>
</body>
</html>
