<?php
// Start the session
session_start();
header('Content-Type: text/html; charset=utf-8');

// Define database connection parameters
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données

// Create database connection
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Check database connection
if ($connexion->connect_error) {
    die("Pas de connexion: " . $connexion->connect_error);
}

// Function to output debug information
function debug_to_console($data) {
    echo '<script>';
    echo 'console.log('. json_encode($data) .')';
    echo '</script>';
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomPdt = isset($_POST['nom_pdt']) ? $_POST['nom_pdt'] : '';
    $prixPdt = isset($_POST['prix_pdt']) ? $_POST['prix_pdt'] : 0;
    $quantPdt = isset($_POST['quant_pdt']) ? $_POST['quant_pdt'] : 0;
    $totPdt = isset($_POST['tot_pdt']) ? $_POST['tot_pdt'] : 0;
    $imgPdt = isset($_POST['img_pdt']) ? $_POST['img_pdt'] : '';

    // Output POST data for debugging
    debug_to_console($_POST);

    // Check if the user is logged in
    if (isset($_SESSION["ID_UTIL"])) {
        $idUti = $_SESSION["ID_UTIL"];
        
        $sql = "INSERT INTO panier (ID_UTIL, pdtNam_adcart, quanti_addcart, pdtPrice_adcart, pdtmontantTotal_adcart, order_date) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $connexion->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("isidd", $idUti, $nomPdt, $quantPdt, $prixPdt, $totPdt);

            // Execute the statement
            if ($stmt->execute()) {
                echo '<script>
                alert("Produit ajouté au panier avec succès !");
                window.location.href = "produit.php";
                </script>';
            } else {
                // Output SQL error for debugging
                error_log("Execute failed: " . $stmt->error);
                echo '<script>
                alert("Erreur lors de l\'ajout du produit au panier. Erreur: ' . $stmt->error . '");
                </script>';
            }

            // Close the statement
            $stmt->close();
        } else {
            // Output prepare error for debugging
            error_log("Prepare failed: " . $connexion->error);
            echo '<script>
            alert("Erreur lors de la préparation de la requête. Erreur: ' . $connexion->error . '");
            </script>';
        }
    } else {
        // User is not logged in, redirect to login page or show a message
        echo '<script>
        alert("Vous devez d\'abord vous inscrire.");
        window.location.href = "chooselogin.html";
        </script>';
    }
}

// Close the database connection
$connexion->close();
?>
