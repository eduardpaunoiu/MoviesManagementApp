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


$descriere_review = $_POST['review'];
$nr_stele = $_POST['stele'];
$nume_film = $_POST['selected_id'];
$id_user = $_SESSION['id'];

$select_movie_id = "SELECT `id_film` FROM `film` WHERE `nume_film` = '$nume_film'";
$result = mysqli_query($con, $select_movie_id);
$id_film = array();
while($row = mysqli_fetch_assoc($result)) {
    $id_film = $row['id_film'];
}


$insert = "INSERT INTO `review`(`descriere_review`, `numar_stele`, `id_film`, `id_utilizator`) 
            VALUES ('$descriere_review','$nr_stele','$id_film','$id_user')";

if(!mysqli_query($con, $insert)) {
    echo 'Query not inserted';
} else {
    echo 'Query inserted successfully';
}

