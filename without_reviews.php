<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$mysqli = new mysqli("localhost", "eduard", "#eduarD123", "movie_db");

$sql = "SELECT DISTINCT nume_film 
            FROM film 
            WHERE id_film IN (SELECT id_film FROM film 
			        WHERE id_film NOT IN (SELECT id_film FROM review))";

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
    <h2>Filmele care nu au review-uri</h2>
    <table>
        <th class="column1">Nume film</th>

        <?php while($rows=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td> <?php echo $rows['nume_film']; ?> </td>
            </tr>
        <?php } ?>

</div>
</body>
</html>
