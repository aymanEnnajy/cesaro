<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['ID_UTIL']) && !empty($_POST['ID_UTIL'])) {
    // Escape the user_id value to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $_POST['ID_UTIL']);

    // Your SQL query
    $sql = "SELECT command.nomdestin_cmd, command.tel_cmd, command.adresseLivr_Cmd, command.STATUT_cmd, command.MONTANT_CMD, panier.pdtNam_adcart, panier.quanti_addcart, panier.pdtPrice_adcart 
            FROM command 
            JOIN panier ON command.ID_UTIL = panier.ID_UTIL 
            WHERE command.ID_UTIL = '$userId'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Start HTML output
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Invoice</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }

                .invoice {
                    width: 80%;
                    margin: 0 auto;
                    border: 1px solid #ccc;
                    padding: 20px;
                    border-radius: 10px;
                }

                .invoice-header {
                    text-align: center;
                }

                .invoice-header h1 {
                    margin-bottom: 10px;
                }

                .invoice-details {
                    margin-top: 20px;
                }

                .invoice-details p {
                    margin: 5px 0;
                }

                .invoice-items {
                    margin-top: 20px;
                }

                .invoice-items table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .invoice-items th, .invoice-items td {
                    border: 1px solid #ccc;
                    padding: 8px;
                }

                .invoice-total {
                    margin-top: 20px;
                    text-align: right;
                }
            </style>
            <div class="invoice">
                <div class="invoice-header">
                    <h1>Invoice</h1>
                </div>
                <div class="invoice-details">
                    <p>Name: <?php echo $row['nomdestin_cmd']; ?></p>
                    <p>Telephone: <?php echo $row['tel_cmd']; ?></p>
                    <p>Address: <?php echo $row['adresseLivr_Cmd']; ?></p>
                    <p>Status: <?php echo $row['STATUT_cmd']; ?></p>
                    <p>Total Amount: $<?php echo $row['MONTANT_CMD']; ?></p>
                </div>
                <div class="invoice-items">
                    <h2>Items:</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['pdtNam_adcart']; ?></td>
                                    <td><?php echo $row['quanti_addcart']; ?></td>
                                    <td>$<?php echo $row['pdtPrice_adcart']; ?></td>
                                    <td>$<?php echo $row['quanti_addcart'] * $row['pdtPrice_adcart']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No invoice data found for this user.";
    }
} else {
    echo "User ID is not set or empty.";
}

// Close the database connection
mysqli_close($conn);
?>
