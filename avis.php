<?php
// Database connection
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

// Get user ID and feedback from POST request
$user_id = $_POST['user_id'];
$feedback = $_POST['feedback'];

// Fetch the user's name from the database
$name_query = $connection->prepare("SELECT NOM_UTLI FROM util WHERE ID_UTIL = ?");
$name_query->bind_param("i", $user_id);
$name_query->execute();
$name_query->bind_result($name);
$name_query->fetch();
$name_query->close();

if ($name) {
    // Prepare and bind the insert statement
    $stmt = $connection->prepare("INSERT INTO avis (ID_UTIL, NOM_AVIS, COMMANTAIRE) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $name, $feedback);

    // Execute the statement
    if ($stmt->execute()) {
        echo "votre avis bien enregistré.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
} else {
    echo "User not found.";
}

$connection->close();
?>
