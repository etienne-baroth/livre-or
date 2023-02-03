<?php

require_once('config.php');

// var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="img/logo.png" alt ="logo voyage">
    </div></a>
    <div class="head_btn">
        <?php 
        if(isset($_SESSION["utilisateur"]["login"])) {
            echo '<p id="btn1"><a href="livre-or.php">Livre d\'Or</a></p>';
            echo '<p id="btn2"><a href="commentaire.php">Commentaires</a></p>';
            echo '<p id="btn3"><a href="logout.php">Déconnexion</a></p>';
        }
        else {
        echo '<p id="btn1"><a href="connexion.php">Se connecter</a></p>';
        echo '<p id="btn2"><a href="inscription.php">Nouveau compte</a></p>';
        } ?>
    </div>
</div>
</header>

<main>

<h1>Bienvenue sur le Livre d'Or <?php if (isset($_SESSION["utilisateur"]["login"])) {echo $_SESSION["utilisateur"]["login"];} ?> ! Vous pouvez accéder au GitHub du site <a href="https://github.com/etienne-baroth/livre-or" target="_blank"> ici</a></h1>

</main>

<footer>

</footer>

</body>
</html>