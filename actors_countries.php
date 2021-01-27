<?php
// Folosim sesiuni pentru a putea manipula variabile in mai multe fisiere
session_start();
// Daca utilizatorul nu este conectat il redirectionam catre pagina principala...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
// Conectarea la baza de date
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'eduard';
$DATABASE_PASS = '#eduarD123';
$DATABASE_NAME = 'movie_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Query pentru a popula un meniu drop-down cu tarile de origine din BD
$sql ='SELECT DISTINCT tara_origine FROM `film`';
$result = $con->query($sql);?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="logged_in_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    <h2>Actorii care joaca in filme in care tara de origine nu este: </h2>

    <form action="actors_countries2.php" method="post">
        <p> Selecteaza tara
            <select name="tara" id='selected_pcid'>

                <?php
                // Facem fetch la rezultatul query-ului de mai sus pentru a le putea pune
                // intr-un meniu de tip select
                while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                    $value= $rows['tara_origine'];
                    ?>
                    <option value="<?= $value?>"><?= $value?></option>
                <?php } ?>
            </select>
        </p>
        <input type="submit" name="submit" value="Watch out!" />
    </form>

</div>
</body>
</html>

