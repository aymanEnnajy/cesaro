<?php

// Connexion à la base de données
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("pas de connexion" . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérifier si l'email existe déjà dans la base de données
    $emailExistsQuery = "SELECT * FROM util WHERE email_util = '$email'";
    $result = $connexion->query($emailExistsQuery);
    if ($result->num_rows > 0) {
        // Email exists
        echo 'exists';
    } else {
        // Email doesn't exist
        echo 'not_exists';
    }
}

?>
