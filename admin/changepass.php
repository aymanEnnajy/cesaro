
<?php


$homes = file_get_contents('changepassword.html');

$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
function showDashboard() {
    // Including the 'index.php' file within a function
    include 'index.php';
}
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);
if($connexion->connect_error){
    die("pas de connexion". $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastpass = $_POST['ancienpass'];
    $newpass = $_POST['nouvpass'];
    $confpass = $_POST['confpass'];
    $email= $_POST['username'];

    // Prepare SQL query to retrieve user from database
    $sql = "SELECT * FROM admine WHERE password_admin='$lastpass' AND email_admin='$email'";
    $result = $connexion->query($sql);

    if ($result->num_rows > 0) {
        // User found
        if($newpass !== $confpass) {
            echo "<script>
            alert('Le nouveau mot de passe ne correspond pas au mot de passe de confirmation.');
            
            </script>";
            showDashboard();
        } else {
            // Prepare and execute the UPDATE query
            $sqly = "UPDATE admine SET password_admin = '$newpass', confirm_admin='$newpass' WHERE email_admin = '$email'";
            $result2 = $connexion->query($sqly);

            if ($result2 === TRUE) {
                echo "<script>alert('Mot de passe mis à jour avec succès
                .');</script>";
                showDashboard();
            } else {
                echo "<script>alert('Erreur lors de la mise à jour du mot de passe :
                " . $connexion->error . "');
                </script>";

                showDashboard() ;
            }
        }
    } else {
        // No user found with the provided credentials
        echo "<script>alert('Nom d'utilisateur ou mot de passe invalide. Veuillez réessayer.
        ');</script>";
        showDashboard();
    }

    $connexion->close();
}




?>


<!--ajouter des admine-->

