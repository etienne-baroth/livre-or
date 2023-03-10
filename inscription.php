<?php

require_once('config.php');

$error = "";
$error2 ="";

if(isset($_POST['submit'])) {

    if(!empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['mdpconf'])) {

        if($_POST['mdp'] == $_POST['mdpconf']) {

            $login = htmlspecialchars($_POST['login']);
            $mdp = $_POST['mdp'];

            $request = $database->prepare('INSERT INTO utilisateurs (login, password) VALUES (?,?)');

            if($request->execute(array($login, $mdp))) {

                header('Location: connexion.php');
            }
        }
        else {
            $error2 = "Veuillez rentrer des informations correctes";
        }
    }
    else {
        $error = "Veuillez remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        <p id="btn1"><a href="connexion.php">Se connecter</a></p>
    </div>
</div>
</header>

<main>

<h1>Formulaire d'inscription</h1>

<form class="form" method="post" action="">
    <input type="text" name="login" placeholder="Login" autocomplete="off">
    <input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off">
    <input type="password" name="mdpconf" placeholder="Confirmation mot de passe" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

<div class="error">
<?php echo $error; ?>
</div>
<div class="error2">
<?php echo $error2; ?>
</div>

</main>

<footer>
    
</footer>

</body>
</html>