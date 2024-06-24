
<?php
// Connexion à la base de données
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
function showDashboard() {
    // Including the 'index.php' file within a function
    include 'index.php';
}

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("pas de connexion" . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_adminnew = $_POST["emailadmin_jdid"];
    $password_adminnew = $_POST['passwadmin_jdid'];
    $password_conf = $_POST['confadm'];

    // Vérification que le mot de passe correspond à la confirmation de mot de passe
    if ($password_adminnew === $password_conf) {
        // Requête SQL pour vérifier si l'email ou le mot de passe existe déjà
        $check_query = "SELECT * FROM admine WHERE email_admin = '$email_adminnew' OR password_admin = '$password_adminnew'";
        $result = $connexion->query($check_query);
        
        if ($result->num_rows > 0) {
            echo "<script>alert('Email ou mot de passe déjà existant dans la base de données');</script>";
        } else {
            // Requête SQL pour insérer les données dans la base de données
            $sql = "INSERT INTO admine (email_admin,password_admin,confirm_admin ) VALUES ('$email_adminnew','$password_adminnew','$password_conf')";

            if ($connexion->query($sql) === TRUE) {
                echo "<script>alert('Vous avez ajouté un nouveau admin avec succès');</script>";
                showDashboard();
            } else {
                echo "Erreur : " . $connexion->error;
            }
        }
    } else {
        echo "<script>alert('Le mot de passe ne correspond pas à la confirmation');</script>";
    }
}
?>
