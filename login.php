<?php
session_start();

$log = file_get_contents('login.html');
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
$home = file_get_contents('index.php');
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("Pas de connexion: " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["email_uti"];
    $password = $_POST["Password_uti"];

    // Prepare SQL statement to fetch user from the database
    $sql = "SELECT ID_UTIL, NOM_UTLI FROM util WHERE email_util = ? AND password_uti = ?";
    $stmt = $connexion->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $connexion->error);
    }

    $stmt->bind_param("ss", $username, $password);

    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    // Bind result variables
    $stmt->bind_result($id_util, $name);

    // Fetch result
    if ($stmt->fetch()) {
        // Set session variables
        $_SESSION["ID_UTIL"] = $id_util;
        $_SESSION["name"] = $name;
        $_SESSION["loggedIn"] = true;
        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
        echo $log;
    }

    // Close statement and connection
    $stmt->close();
    $connexion->close();
}
?>
