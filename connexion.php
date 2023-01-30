<?php

require_once('config.php');

$error="";

if(isset($_POST['submit'])) {

    if(!empty($_POST['login']) && !empty($_POST['mdp'])) {

        $login = htmlspecialchars($_POST['login']);
        $mdp = $_POST['mdp'];

        $getUser = $database->prepare("SELECT* FROM utilisateurs WHERE login = :login AND password = :password");

        $getUser->bindValue(":login", $login);
        $getUser->bindValue(":password", $mdp);

        $getUser->execute();

        $user = $getUser->fetch();

        if(!$user) {
            die($error = "Votre login et/ou mot de passe est incorrect");
        }

        $_SESSION["utilisateur"] = [
            "id" => $user["id"],
            "login" => $user["login"]
        ];

        header('Location: profil.php');
        // var_dump($_SESSION);

    }
    elseif(empty($_POST['login']) && !empty($_POST['mdp'])) {
        $error = "Veuillez saisir votre login";
    }
    elseif(empty($_POST['mdp']) && !empty($_POST['login'])) {
        $error = "Veuillez saisir votre mot de passe";
    }
    else {
        $error = "Veuillez saisir votre login et mot de passe";
    }

    if($_POST['login']=="admin" && $_POST['mdp']=="admin") {
        $login = htmlspecialchars($_POST['login']);
        $mdp = $_POST['mdp'];

        $getUser = $database->prepare("SELECT* FROM utilisateurs WHERE login = :login AND password = :password");

        $getUser->bindValue(":login", $login);
        $getUser->bindValue(":password", $mdp);

        $getUser->execute();

        $user = $getUser->fetch();


        $_SESSION["utilisateur"] = [
            "id" => $user["id"],
            "login" => $user["login"]
        ];

        header('Location: admin.php');
        // var_dump($_SESSION);

    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <p><a href="inscription.php">Nouveau compte</a></p>
    </div>
</div>
</header>

<main>

<h1>Connexion</h1>

<form class="form" method="post" action="">
    <input type="text" name="login" placeholder="Login" autocomplete="off">
    <input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

<div class="error">
<?php echo $error; ?>
</div>

</main>

</body>
</html>