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
$film = $_POST['selected_film'];
$sql = "SELECT R.descriere_review, R.numar_stele, U.username FROM review R\n"

    . "JOIN film F on R.id_film = F.id_film\n"

    . "JOIN utilizator U on R.id_utilizator = U.id_utilizator\n"

    . "WHERE F.nume_film = '$film'";
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
    <h2>Selected movie: <?php echo $film ?></h2>
    <table>
        <th class="column1">Review description</th>
        <th class="column2">No. of stars given </th>
        <th class="column3">Given by</th>

        <?php while($rows=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td> <?php echo $rows['descriere_review']; ?> </td>
                <td> <?php echo $rows['numar_stele']; ?> </td>
                <td> <?php echo $rows['username']; ?> </td>
            </tr>
        <?php } ?>

    </table>
</div>
</body>
</html>
