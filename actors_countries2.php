<?php
// We need to use sessions
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
// Conexiunea la BD
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'eduard';
$DATABASE_PASS = '#eduarD123';
$DATABASE_NAME = 'movie_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Query complex cu parametru variabil
$id = $_SESSION['id'];
$tara = $_POST['tara'];
$sql = "SELECT A.nume_actor, A.prenume_actor, F.nume_film
            FROM ACTOR A 
            JOIN filmactori FA ON FA.id_actor = A.id_actor
            JOIN film F ON FA.id_film = F.id_film
            WHERE F.tara_origine IN (SELECT DISTINCT tara_origine FROM film WHERE tara_origine != '$tara' )
            ORDER BY F.nume_film";
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
    <h2>Actorii care joaca in filme in care tara de origine nu este  <?php echo $tara ?></h2>
    <table>
        <th class="column1">Actor Surname</th>
        <th class="column2">Actor Name </th>
        <th class="column3">Movie title</th>

        <?php while($rows=mysqli_fetch_assoc($result))
        {   // Fetch la rezultatele query-ului
            ?>
            <tr>
                <td> <?php echo $rows['prenume_actor']; ?> </td>
                <td> <?php echo $rows['nume_actor']; ?> </td>
                <td> <?php echo $rows['nume_film']; ?> </td>
            </tr>
        <?php } ?>

    </table>
</div>
</body>
</html>
