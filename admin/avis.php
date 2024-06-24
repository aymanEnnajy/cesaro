<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mdp = "";
$base_de_donnees = "projet_finetude";

$connexion = new mysqli($serveur, $utilisateur, $mdp, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Récupérer les données de la table
$sql = "SELECT * FROM avis";
$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // Afficher les données dans le tableau HTML
    while($row = $resultat->fetch_assoc()) {
        echo "<tr><td>" . $row["ID_AVIS"] . "</td><td>" . $row["NOM_AVIS"] ."</td><td style='text-align:center;'>".$row["COMMANTAIRE"]."</td></tr>";
    }
} else {
    echo "0 résultats";
}

// Fermer la connexion
$connexion->close();
?>
