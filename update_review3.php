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
$id_utilizator = $_SESSION['id'];
$descr_review = $_POST['review'];
$stele = $_POST['stele'];
$movie = $_SESSION['movie'];

$sql = "UPDATE `review`
            SET `descriere_review`='$descr_review',`numar_stele` = '$stele'
            WHERE id_utilizator = '$id_utilizator' AND id_film = (SELECT id_film FROM film WHERE nume_film = '$movie')";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
$con->close();