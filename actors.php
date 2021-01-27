<?php
// Conectarea la baza de date
// Simpla afisare a datelor din tabela actori.
$mysqli = new mysqli("localhost", "eduard", "#eduarD123", "movie_db");
$query = 'SELECT * FROM `actor`';
$result = $mysqli->query($query);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
?>
<!DOCTYPE html>
<head>
    <title> Actors </title>
</head>
<body>
<link href="logged_in_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link href="tables_style.css" rel="stylesheet" type="text/css">
<div class="content">
<table>
    <tr>
        <th><h2>Our favourite actors</h2></th>
    </tr>
    <th> Actor Surname </th>
    <th> Actor Name </th>
    <th> Birthday </th>
    <th> Bio </th>

    </tr>

    <?php while($rows=mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td> <?php echo $rows['prenume_actor']; ?> </td>
            <td> <?php echo $rows['nume_actor']; ?> </td>
            <td> <?php echo $rows['data_nasterii']; ?> </td>
            <td> <?php echo $rows['bio_actor']; ?> </td>
        </tr>
        <?php
    }
    ?>

</table>
</div>
</body>
