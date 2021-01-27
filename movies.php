<?php
    // Require DataBase Connection
    $mysqli = new mysqli("localhost", "eduard", "#eduarD123", "movie_db");
    $query = 'SELECT * FROM `film`';
    $result = $mysqli->query($query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    ?>
<!DOCTYPE html>
<head>
    <title> Movies </title>
</head>
<body>
<link href="logged_in_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link href="tables_style.css" rel="stylesheet" type="text/css">
<table >
    <tr>
        <th colspan="12"><h2>All the movies</h2></th>
    </tr>
    <th> Name </th>
    <th> Description </th>
    <th> Audience </th>
    <th> Duration </th>
    <th> Launched </th>
    <th> Original Country</th>
    <th> Original Language</th>
    <th> Trivia </th>
    <th> Director Surname</th>
    <th> Director Name</th>
    <th> Writer Surname</th>
    <th> Writer Name</th>

    </tr>

    <?php while($rows=mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td> <?php echo $rows['nume_film']; ?> </td>
            <td> <?php echo $rows['descriere_actiune']; ?> </td>
            <td> <?php echo $rows['categorie_audienta']; ?> </td>
            <td> <?php echo $rows['durata']; ?> </td>
            <td> <?php echo $rows['data_lansarii']; ?> </td>
            <td> <?php echo $rows['tara_origine']; ?> </td>
            <td> <?php echo $rows['limba_originala']; ?> </td>
            <td> <?php echo $rows['trivia_film']; ?> </td>
            <td> <?php echo $rows['prenume_director']; ?> </td>
            <td> <?php echo $rows['nume_director']; ?> </td>
            <td> <?php echo $rows['prenume_scenarist']; ?> </td>
            <td> <?php echo $rows['nume_scenarist']; ?> </td>
        </tr>
        <?php
    }
    ?>

</table>
</body>
