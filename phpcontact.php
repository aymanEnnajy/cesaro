<?php

$lien = file_get_contents('lien.html');
// Connexion à la base de données
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données

$connexion = mysql_connect($serveur, $utilisateur, $motdepasse);
if (!$connexion) {
    die('pas de connexion: ' . mysql_error());
}
mysql_select_db($basededonnees, $connexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = mysql_real_escape_string($_POST["nom"]);
    $email = mysql_real_escape_string($_POST['email']);
    $tel = mysql_real_escape_string($_POST['tel']);
    $msg = mysql_real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact (nomComp_contc, email_contc, tele_contc, message_contc) VALUES ('$nom','$email','$tel','$msg')";

    if (mysql_query($sql, $connexion)) {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo '<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">';
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<style>";
        echo ".flex-container {";
        echo "  display: flex;";
        echo "  justify-content: center;";
        echo "  align-items: center;"; // Alignement vertical au centre si nécessaire
        echo "}";
        echo ".me { font-size: 19px; }";
        echo "#moi { font-size: 13px; }";
        echo "</style>";
        echo "</head>";
        echo "<body>";

        // Contenu de la page HTML
        echo "<div class='flex-container'><img style='width:45px; margin-right:12px;' src='images/cochez-le-cercle-interieur.png'><h1 style='color:#149602'> Félicitations </h1></div>";
        echo "<div class='flex-container'>";
        echo "<p class='me'>Votre message bien enregistré <br> Nous vous contacterons le plus tôt possible</p>";
        echo "</div>";
        echo "<div class='flex-container' id='moi'>";
        echo "<a href='javascript:void(0);' onclick='history.back();'>Retourner à la page précédente</a>";
        echo "</div>";

        echo "</body>";
        echo "</html>";
    } else {
        echo "Erreur: " . mysql_error();
    }
}

mysql_close($connexion);

?>
