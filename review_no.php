<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
$mysqli = new mysqli("localhost", "eduard", "#eduarD123", "movie_db");

$sql = "SELECT F.nume_film AS 'MovieTitle', COUNT(R.id_film) AS 'NoRatings',
        (SELECT AVG(R.numar_stele) FROM film F1
        JOIN review R ON F1.id_film = R.id_film WHERE F1.nume_film = F.nume_film ) AS 'AvgRating'
        FROM film F, review R
        WHERE R.id_film = F.id_film
        GROUP BY F.nume_film";


$result = $mysqli->query($sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="logged_in_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="tables_style.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <h1>The new IMDb</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class = "content">
    <h2>See the number of reviews and average rating for every movie</h2>
    <table>
        <th class="column1">Movie Title</th>
        <th class="column2">No. of reviews </th>
        <th class="column3">Average no. of stars </th>

        <?php while($rows=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td> <?php echo $rows['MovieTitle']; ?> </td>
                <td> <?php echo $rows['NoRatings']; ?> </td>
                <td> <?php echo $rows['AvgRating']; ?> </td>
            </tr>
        <?php } ?>

</div>
</body>
</html>
