<?php
// Folosim sesiuni pentru a putea manipula variabile in mai multe fisiere
session_start();
// Daca utilizatorul nu este conectat il redirectionam catre pagina principala...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
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

// Query simplu cu parametru variabil
$id = $_SESSION['id'];
$audience = $_POST['selected_audience'];
$sql = "SELECT A.prenume_actor, A.nume_actor, F.nume_film FROM actor A \n"

    . "JOIN filmactori FA ON A.id_actor = FA.id_actor\n"

    . "JOIN film F ON F.id_film = FA.id_film\n"

    . "WHERE F.categorie_audienta = '$audience'\n"

    . "ORDER BY F.nume_film";
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
    <h2>Selected audience: <?php echo $audience ?></h2>
    <table>
        <th class="column1">Actor Surname</th>
        <th class="column2">Actor Name </th>
        <th class="column3">Movie title</th>

        <?php while($rows=mysqli_fetch_assoc($result))
            // Afisarea rezultatului quey-ului sub forma de tabel, facand fetch rezultatului.
        {
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
