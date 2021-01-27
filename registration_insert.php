<?php


    $connection = mysqli_connect('localhost', 'eduard', '#eduarD123', 'movie_db');

    if(!$connection)
    {
        echo 'Not connected to the server';
    }

    $prenume = $_POST['prenume_utilizator'];
    $nume = $_POST['nume_utilizator'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $today = date('Y-m-d H:i:s');

    $hashed_password = password_hash($parola, PASSWORD_DEFAULT);

    $SQL_INSERT = "INSERT INTO `utilizator` (id_utilizator, username, email, parola, nume_utilizator, prenume_utilizator, data_inregistrarii)
                                    VALUES (DEFAULT, '$username', '$email', '$hashed_password', '$nume', '$prenume', '$today')";

    if(!mysqli_query($connection, $SQL_INSERT)) {
        echo 'Query not inserted';
    } else {
        echo 'Query inserted successfully';
    }



?>