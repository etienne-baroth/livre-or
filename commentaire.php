<?php

require_once('config.php');

// var_dump($_SESSION);

$getUser = $database->prepare('SELECT* FROM utilisateurs');

$getUser->execute();

$user = $getUser->fetch();

if(isset($_POST["submit"])) {

    $commentaire = htmlspecialchars($_POST['commentaire']);
    $id_utilisateur = $_SESSION["utilisateur"]["id"];
    $date = date("Y-m-d");

    if(!empty($commentaire)) {

        $userId = $_SESSION["utilisateur"]["id"];
        $getUser = $database->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?,?,?)");

        $getUser-> bindValue(":id_utilisateur", $id_utilisateur);
        $getUser->execute([$commentaire, $id_utilisateur, $date]);

        echo "Le commentaire est validé";

    } else {
        echo "Veuillez écrire un commentaire";
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage">
    </div></a>
    <div class="head_btn">
        <p id="btn1"><a href="livre-or.php">Livre d'Or</a></p>
        <p id="btn2"><a href="profil.php">Modifier Profil</a></p>
        <p id="btn3"><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<h1 id="TitreCommentaire">Bienvenue dans la section commentaires <?php echo $_SESSION["utilisateur"]["login"] ?>. Vous pouvez ajouter un nouveau commentaire ici</h1>

<form class="form" method="post" action="">
    <input id="commentaire" type="text" name="commentaire" placeholder="Votre commentaire" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

</main>

<footer>
    
</footer>

</body>
</html>