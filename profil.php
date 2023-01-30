<?php

require_once('config.php');

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
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <p><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<h1>Modifier son profil</h1>

<div class="modif">
<form class="form" method="post" action="">
    <input type="text" name="newlogin" value=""placeholder="Nouveau Login" autocomplete="off">
    <input type="password" name="newmdp" placeholder="Nouveau mot de passe" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Modifier">
</form>
</div>

</main>

</body>
</html>