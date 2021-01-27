<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link href="logged_in_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="tables_style.css" rel="stylesheet" type="text/css">
</head>
<body class="loggedin">
<nav class="navtop element">
    <div>
        <h1>The new IMDb</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>
<div class = content>
    <h2 align="center">Aplicație de Feedback și Clasificare a Filmelor
        <br>
    Bine ai venit, <?=$_SESSION['name']?>!</h2>

</div>
<div class = "content" align="center">
    <h2> Poți să: </h2>
    <form action="filter_genres.php">
        <button class="button5" type="submit">Clasifici filmele dupa gen</button>
    </form>

    <form action="average_stars.php">
        <button class="button5" type="submit">Vizualizezi rating-urile unui film</button>
    </form>

    <form action="filter_genresII.php">
        <button class="button5" type="submit">Vizualizezi toate filmele cu un gen anume</button>
    </form>


    <form action="movie_actors.php">
        <button class="button5" type="submit">Vizualizezi ce actori joaca intr-un film</button>
    </form>


    <form action="movie_reviews.php">
        <button class="button5" type="submit">Vizualizezi toate review-urile unui film</button>
    </form>

    <form action="actors_audience.php">
        <button class="button5" type="submit">Vizualizezi actorii care joaca in filme cu o categorie de audienta anume</button>
    </form>

    <form action="review_no.php">
        <button class="button5" type="submit">Vizualizezi numarul de review-uri si rating-ul tuturor filmelor</button>
    </form>

    <form action="actors_genres.php">
        <button class="button5" type="submit">Vizualizezi genurile filmelor in care joaca actorii cu anul nasterii mai mare decat X</button>
    </form>

    <form action="review_stars.php">
        <button class="button5" type="submit">Vizualizezi filmele care au rating-ul mai mare decat X stele</button>
    </form>

    <form action="common_actors.php">
        <button class="button5" type="submit">Vizualizezi numele filmelor in care unul sau mai multi actori joaca in doua sau mai multe filme</button>
    </form>

    <form action="without_reviews.php">
        <button class="button5" type="submit">Vizualizezi filmele care nu au review-uri</button>
    </form>

    <form action="actors_countries.php">
        <button class="button5" type="submit">Vizualizezi actorii care joaca in filme lansate in alte tari in afara de tara X</button>
    </form>

</div>
</body>
</html>
