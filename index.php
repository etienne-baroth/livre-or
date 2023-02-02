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
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <?php 
        if(isset($_SESSION["utilisateur"]["login"])) {
            echo '<p><a href="livre-or.php">Livre d\'Or</a></p>';
            echo '<p><a href="commentaire.php">Commentaires</a></p>';
            echo '<p><a href="logout.php">Déconnexion</a></p>';
        }
        else {
        echo '<p><a href="connexion.php">Se connecter</a></p>';
        echo '<p><a href="inscription.php">Nouveau compte</a></p>';
        } ?>
    </div>
</div>
</header>

<main>

<h1>Bienvenue sur le Livre d'Or <?php if (isset($_SESSION["utilisateur"]["login"])) {echo $_SESSION["utilisateur"]["login"];} ?> !</h1>

</main>

</body>
</html>