<?php

session_start();

try {
    $database = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');
}

catch (Exception $e) {
    die('Erreur: '. $e->getMessage());
}

?>