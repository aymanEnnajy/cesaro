<?php


$lien = file_get_contents('lien.html');
// Connexion à la base de données
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if($connexion->connect_error){
    die("pas de connexion". $connexion->connect_error);
}/*else{
    echo "all is good";
}*/


?>