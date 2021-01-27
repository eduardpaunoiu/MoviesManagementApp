<?php
// We need to use sessions
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
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
$anul = $_POST['anul'];
$sql = "SELECT DISTINCT G.nume_gen, F.nume_film FROM gen G
             JOIN filmgenuri FG ON G.id_gen_film = FG.id_gen_film
             JOIN film F ON F.id_film = FG.id_film
             JOIN filmactori FA ON F.id_film = FA.id_film
             JOIN actor A ON A.id_actor = FA.id_actor
            WHERE A.id_actor IN (SELECT id_actor FROM actor HAVING YEAR(data_nasterii) > '$anul')
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
    <h2>Genurile filmelor in care joaca actorii cu anul nasterii mai mare decat <?= $anul?>  </h2>
    <table>
        <th class="column1">Genul</th>
        <th class="column1">Filmul</th>


        <?php while($rows=mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td> <?php echo $rows['nume_gen']; ?> </td>
                <td> <?php echo $rows['nume_film']; ?> </td>
            </tr>
        <?php } ?>

    </table>

</div>
</body>
</html>


