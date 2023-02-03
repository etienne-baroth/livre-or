<?php

require_once('config.php');

// var_dump($_SESSION);

$getUser = $database->query("SELECT login, commentaire, date FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");

$livreor = $getUser->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Or</title>
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
        <p id="btn1"><a href="commentaire.php">Commentaires</a></p>
        <p id="btn2"><a href="profil.php">Modifier Profil</a></p>
        <p id="btn3"><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<h1>Le fil de commentaires du livre d'or</h1>

<?php

foreach($livreor as $livredor): ?>

<div class="livreorTable">
<table>
    <tr>
        <th>Posté le</th>
        <th>Utilisateur</th>
        <th>Commentaire</th>
    </tr>
    <tr>
        <td><?php echo $livredor["date"]; ?></td>
        <td><?php echo $livredor["login"]; ?></td>
        <td><?php echo $livredor["commentaire"]; ?></td>
    </tr>
</table>
</div>

<?php endforeach; ?>

</main>

<footer>
    
</footer>

</body>
</html>