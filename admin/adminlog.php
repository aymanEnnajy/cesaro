<?php
$homes = file_get_contents('login.html');
function showDashboard() {
    // Including the 'index.php' file within a function
    include 'index.php';
}
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
$home = file_get_contents('index.php');
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);
if($connexion->connect_error){
    die("pas de connexion". $connexion->connect_error);
}




// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    // Prepare SQL query to retrieve user from database
    $sql = "SELECT * FROM admine WHERE email_admin='$username' AND password_admin='$password'";
    $result = $connexion->query($sql);

    if ($result->num_rows > 0) {
        // User found, redirect to success page or do further processing
       
       showDashboard();
       
        // Redirect to another page after login
        // header("Location: welcome.php");
    } else {
        // No user found with the provided credentials
        echo "<script>";
        echo "alert('Invalid username or password. Please try again.');";
        // Redirect to login page
        echo "</script>";
        echo $homes ;
    }
}

$connexion->close();
?>