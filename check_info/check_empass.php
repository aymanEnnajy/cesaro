<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "projet_finetude";

// Establishing a database connection
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("pas de connexion" . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $sql_email = "SELECT * FROM admine WHERE email_admin='$email'";
        $result_email = $connexion->query($sql_email);
        if ($result_email->num_rows > 0) {
            echo '<span style="color: red;">Email already exists</span>';
        }
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $sql_password = "SELECT * FROM admine WHERE password_admin='$password'";
        $result_password = $connexion->query($sql_password);
        if ($result_password->num_rows > 0) {
            echo '<span style="color: red;">Password already exists</span>';
        }
    }
}

$connexion->close();
?>

<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "projet_finetude";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("pas de connexion" . $connexion->connect_error);
}

$password = $_POST['password'];
$sql = "SELECT * FROM admine WHERE password_admin='$password'";
$result = $connexion->query($sql);

if ($result->num_rows > 0) {
    echo '<span style="color: red;">Password already exists</span>';
} else {
    echo '';
}

$connexion->close();
?>

