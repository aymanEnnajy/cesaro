<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve user ID
function getUserId() {
    if (isset($_SESSION['ID_UTIL'])) {
        return $_SESSION['ID_UTIL'];
    } else {
        // Handle the case when user ID is not available
        return null;
    }
}

$userId = getUserId();
if ($userId === null) {
    die("User ID not found. Please log in.");
}

// Delete cart items
$deleteCartQuery = "DELETE FROM panier WHERE ID_UTIL = '$userId'";
if ($connection->query($deleteCartQuery) === TRUE) {
    // Redirect to home page after successful deletion
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting cart items: " . $connection->error;
}

// Close database connection
$connection->close();
?>
