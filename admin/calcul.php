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

$sql = "SELECT SUM(MONTANT_CMD) as total_amount FROM command";
$result = $conn->query($sql);

$total_amount = 0; // Initialize total amount
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_amount = $row['total_amount'];
}

$conn->close();
?>

<div>
    <div class="numbers"><?php echo number_format($total_amount, 2); ?>Dh</div>
    <div class="cardName">Chiffre d'affaire </div>
</div>
