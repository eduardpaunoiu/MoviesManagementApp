<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: update_review.php');
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
$selected_movie = $_POST['selected_review'];
$_SESSION['movie'] = $selected_movie;
$stmt = $con->prepare("SELECT descriere_review, numar_stele FROM review 
WHERE id_utilizator = ? AND id_film = (SELECT id_film FROM film WHERE nume_film = '$selected_movie')");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($descriere_review, $numar_stele);
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

        <form action="update_review3.php" method="post">
            <p>
                Selected movie:
                <?=$selected_movie?>
            </p>
            <p> Your review:  <textarea name="review" rows="4" cols="50"> <?=$descriere_review?></textarea> </p>
            <p> How many stars it deserves(/10): <input type="text" name="stele" value="<?=$numar_stele?>" /><br />  </p>
            <input type="submit" name="submit" value="Update this review" />
        </form>

    </div>
</div>


</body>
</html>
