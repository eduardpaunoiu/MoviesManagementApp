<?php
// Require DataBase Connection
$mysqli = new mysqli("localhost", "eduard", "#eduarD123", "movie_db");
$query = 'SELECT * FROM `gen`';
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
<table>
    <tr>
        <th colspan="2"><h2>Top Genres</h2></th>
    </tr>
    <th> Name </th>
    <th> Description </th>

    </tr>

    <?php while($rows=mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td> <?php echo $rows['nume_gen']; ?> </td>
            <td> <?php echo $rows['descriere_gen']; ?> </td>
        </tr>
        <?php
    }
    ?>

</table>
</body>
