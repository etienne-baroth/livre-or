<?php

require_once('config.php');

// var_dump($_SESSION);

$getUser = $database->prepare('SELECT* FROM utilisateurs');

$getUser->execute();

$user = $getUser->fetch();


if(isset($_POST["submit"])) {

    $newmdp = $_POST['newmdp'];
    $newlogin = htmlspecialchars($_POST['newlogin']);

    if(!empty($newlogin) && !empty($newmdp)) {

        $userId = $_SESSION["utilisateur"]["id"];
        $getUser = $database->prepare("UPDATE utilisateurs SET `login` = '$newlogin', `password` = :password WHERE `id`='$userId'");

        $getUser->bindValue(":password", $newmdp);

        $getUser->execute();

        echo "Les modifications sont enregistrées";

    } else {
        echo "Toutes les informations sont nécessaires";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Profil</title>
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
        <p id="btn1"><a href="livre-or.php">Livre d'Or</a></p>
        <p id="btn2"><a href="commentaire.php">Commentaires</a></p>
        <p id="btn3"><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<h1 id="TitreProfil">Envie de modifier votre login <?php echo $_SESSION["utilisateur"]["login"] ?> ? Vous pouvez le faire ici en même temps que votre mot de passe</h1>

<div class="modif">
<form class="form" method="post" action="">
    <label for="Nouveau Login">Nouveau Login</label>
    <input type="text" name="newlogin" autocomplete="off">
    <label for="Nouveau Mot de Passe">Nouveau Mot de Passe</label>
    <input type="password" name="newmdp"  autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Modifier">
</form>
</div>

</main>

<footer>
    
</footer>

</body>
</html>