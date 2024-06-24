<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product name from AJAX request
    $productName = $_POST["productName"];

    // Prepare and execute SQL statement to check if product name exists
    $stmt = $conn->prepare("SELECT NOM_PDT FROM produit WHERE NOM_PDT = ?");
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Product name already exists
        echo "<span style='color: red;'>Le nom du produit existe déjà dans la base de données. Veuillez choisir un autre nom.</span>";
    } else {
        // Product name does not exist
        echo "<span style='color: green;'>Le nom du produit est disponible.</span>";
    }

    // Close prepared statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
