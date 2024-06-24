<?php
session_start();
$host = 'localhost';
$dbname = 'projet_finetude';
$username = 'root';
$password = '';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

// Get the product ID from the POST request
$product_id = $_POST['product_id'];

// Delete the product from the database
$query = "DELETE FROM panier WHERE id_adcart = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);

if ($stmt->execute()) {
    // Redirect back to the shopping cart page
    header("Location: cart.php");
    exit;
} else {
    die('Error deleting product: ' . $stmt->error);
}

$stmt->close();
$conn->close();
?>
