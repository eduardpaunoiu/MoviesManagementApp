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

$id = $_SESSION['id'];
$sql = "SELECT F.nume_film, R.descriere_review, R.numar_stele
        FROM film AS F 
        JOIN review AS R ON F.id_film = R.id_film 
        WHERE R.id_utilizator = '$id'";
$result = mysqli_query($con, $sql);
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
    <h2>Here are your reviews</h2>
    <table>
        <th class="column1"> Movie Title </th>
        <th class="column2"> Your Review </th>
        <th class="column3"> No. of Stars </th>

    <?php while($rows=mysqli_fetch_assoc($result))
    {
    ?>
    <tr>
        <td> <?php echo $rows['nume_film']; ?> </td>
        <td> <?php echo $rows['descriere_review']; ?> </td>
        <td> <?php echo $rows['numar_stele']; ?> </td>
    </tr>
    <?php } ?>

    </table>
</div>
</body>
</html>
