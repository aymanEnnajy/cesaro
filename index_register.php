<?php
header('Content-Type: text/html; charset=utf-8');
$lien = file_get_contents('lien.html');
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $tel = $_POST['telephone'];
    $codepostale = $_POST['codepostale'];
    $ville = $_POST['ville'];
    $genre = $_POST['genre'];
    $password = $_POST['password'];
    $passwordcheck = $_POST['Confirmer'];

    // Requête SQL pour vérifier si l'email existe déjà
    $check_email_query = "SELECT * FROM util WHERE email_util = '$email'";
    $result = $connexion->query($check_email_query);
    if ($result->num_rows > 0) {
        // Si l'email existe déjà, afficher un message d'erreur et bloquer l'inscription
        echo "<script>alert('Cet email existe déjà. Veuillez utiliser un autre email.');
        window.location.href = 'signup.html'
        </script>";
    } else {
        // Sinon, exécuter la requête d'insertion
        $sql = "INSERT INTO util (NOM_UTLI,PRENOM_UTLI,ADRESSE__UTLI,email_util,TEL_UTLI,CODE_POSTAL,VILLE_UTIL,GENRE_UTIL,Password_uti,confirm_password ) VALUES ('$nom','$prenom', '$adresse', '$email','$tel','$codepostale','$ville','$genre','$password','$passwordcheck')";
        if ($connexion->query($sql) === TRUE) {
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
            echo ".me{font-size: 19px;}";
            echo "#moi{font-size: 13px;}";
            echo "  align-items: center;"; // Alignement vertical au centre si nécessaire
            // Pour occuper toute la hauteur de la fenêtre
            echo "}";
            echo "</style>";
            echo "</head>";
            echo "<body>";

            // Contenu de la page HTML
            echo "<div class='flex-container'><img style='width:45px; margin-right:12px;' src='images/cochez-le-cercle-interieur.png'><h1 style='color:#149602'> $prenom Félicitations </h1></div>";
            echo "<div class='flex-container' >


        <p class='me'>Votre inscription a été bien enregistrée. Merci de vous être inscrit !</p>
        <br>
        <br>

        </div>";
            echo "<div class='flex-container' id='moi'>
            $lien
        </div>";


        } else {
            echo "erreur" . $connexion->error;
        }
    }
}

?>