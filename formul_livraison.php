<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nom = $connection->real_escape_string($_POST["nom"]);
    $adresse = $connection->real_escape_string($_POST["adresse"]);
    $tel = $connection->real_escape_string($_POST["tel"]);
    $codepostal = $connection->real_escape_string($_POST["codepostal"]);
    $total = $connection->real_escape_string($_POST["total"]);
    $paiementALaLivraison = isset($_POST["cashondelevery"]) ? "paiement a la livraison" : "paiement par banque";

    // Retrieve user ID from session
    session_start();
    $userId = isset($_SESSION['ID_UTIL']) ? $_SESSION['ID_UTIL'] : null;
    if ($userId === null) {
        die("User ID not found. Please log in.");
    }

    // Check if the user ID exists in the util table
    $checkQuery = "SELECT ID_UTIL FROM util WHERE ID_UTIL = '$userId'";
    $result = $connection->query($checkQuery);
    if ($result->num_rows == 0) {
        die("User ID does not exist.");
    }

    // Retrieve all product names from addcart for the given user
    $productNamesQuery = "SELECT pdtNam_adcart FROM panier WHERE ID_UTIL = '$userId'";
    $productNamesResult = $connection->query($productNamesQuery);
    $productNames = array(); // Corrected array syntax

    while ($row = $productNamesResult->fetch_assoc()) {
        $productNames[] = "+".$row['pdtNam_adcart'];
    }

    // Concatenate product names into a single string
    $productNamesString = implode(" ", $productNames);

    // Insert data into the command table
    $query = "INSERT INTO command (ID_UTIL, nomdestin_cmd, adresseLivr_Cmd, tel_cmd, codepostal_cmd, STATUT_cmd, DATE_CMD, MONTANT_CMD, nom_pdts) VALUES ('$userId', '$nom', '$adresse', '$tel', '$codepostal', '$paiementALaLivraison', NOW(), '$total', '$productNamesString')";

    if ($connection->query($query) === TRUE) {
        // Uncomment the following line if you want to clear the cart after placing the order
        // $deleteCartQuery = "DELETE FROM addcart WHERE ID_UTIL = '$userId'";
        // $connection->query($deleteCartQuery);

        // Fetch the data for the invoice
        $invoiceQuery = "SELECT pdtNam_adcart, pdtPrice_adcart, quanti_addcart, pdtmontantTotal_adcart, produit.image_pdt FROM panier
                         JOIN produit ON panier.pdtNam_adcart = produit.NOM_PDT
                         WHERE panier.ID_UTIL = '$userId'";
        $invoiceResult = $connection->query($invoiceQuery);
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
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div style="display:flex; justify-content:right;">
        <button style="background-color:#f35525; border:1px solid #f35525; cursor:pointer;" onclick="printInvoice()"><i class="fa fa-print" style="font-size: 34px; color: #ffeee9;"></i></button>
    </div>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/logo.png" style="width:195px;">
                            </td>
                            <td>
                                information<br>
                                de registre<br>
                                commerciale
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td style="padding-right: 144px;">
                                CESARO<br>
                                imm. Chkili, Bd Abdelkrim Al Khattabi,<br>
                                Marrakech<br>
                                cesaromaroc@gmail.com
                            </td>
                            <td>
                                <?php echo htmlspecialchars($nom); ?><br>
                                <?php echo htmlspecialchars($adresse); ?><br>
                                <?php echo htmlspecialchars($tel); ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Produit</td>
                <td style="text-align:center;">Prix</td>
                <td style="text-align:center;">Quantité</td>
                <td>Prix total</td>
            </tr>
<?php
            while ($row = $invoiceResult->fetch_assoc()) {
?>
            <tr class="item">
                <td><?php echo htmlspecialchars($row["pdtNam_adcart"]); ?></td>
                <td style="text-align:center;"><?php echo htmlspecialchars($row["pdtPrice_adcart"]); ?> Dh</td>
                <td style="text-align:center;"><?php echo htmlspecialchars($row["quanti_addcart"]); ?></td>
                <td><?php echo htmlspecialchars($row["pdtmontantTotal_adcart"]); ?> Dh</td>
            </tr>
<?php
            }
?>
            <tr class="total">
                <td colspan="3" style="text-align:right;">Total:</td>
                <td><?php echo htmlspecialchars($total); ?> Dh</td>
            </tr>
        </table>
    </div>
    <style>
        body {
            font-family: "Arial", sans-serif;
            text-align: center;
            color: #333;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica", "Arial", sans-serif;
            color: #555;
            background-color: #ffeee9;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #f35525;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            color: white;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        #go {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>

    <br><br>
    <div>
        <a id="go" href="delete_cart.php">Back to Home</a>
    </div>
    <input type="hidden" id="user_id" value="<?php echo htmlspecialchars($userId); ?>" />

    <script>
        function printInvoice() {
            var printContents = document.querySelector('.invoice-box').outerHTML;
            var originalContents = document.body.innerHTML;
            
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link rel="stylesheet" href="css/fontawesome.css"><link rel="stylesheet" href="css/templatemo-villa-agency.css"><link rel="stylesheet" href="css/owl.css"><link rel="stylesheet" href="css/animate.css"><title>Print Invoice</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: "Arial", sans-serif; text-align: center; color: #333; }');
            printWindow.document.write('.invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); font-size: 16px; line-height: 24px; font-family: "Helvetica", "Arial", sans-serif; color: #555; }');
            printWindow.document.write('.invoice-box table { width: 100%; line-height: inherit; text-align: left; border-collapse: collapse; }');
            printWindow.document.write('.invoice-box table td { padding: 5px; vertical-align: top; }');
            printWindow.document.write('.invoice-box table tr td:nth-child(2) { text-align: right; }');
            printWindow.document.write('.invoice-box table tr.top table td { padding-bottom: 20px; }');
            printWindow.document.write('.invoice-box table tr.top table td.title { font-size: 45px; line-height: 45px; color: #333; }');
            printWindow.document.write('.invoice-box table tr.information table td { padding-bottom: 40px; }');
            printWindow.document.write('.invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; }');
            printWindow.document.write('.invoice-box table tr.item td { border-bottom: 1px solid #eee; }');
            printWindow.document.write('.invoice-box table tr.total td:nth-child(2) { border-top: 2px solid #eee; font-weight: bold; }');
            printWindow.document.write('</style></head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
        
        function showAlert() {
            setTimeout(function() {
                var feedback = prompt("Svp donnez nous votre avis sur notre produit");
                if (feedback !== null) {
                    var userId = document.getElementById('user_id').value;
                    // Send feedback to the server using AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "avis.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.responseText);
                        }
                    };
                    xhr.send("user_id=" + encodeURIComponent(userId) + "&feedback=" + encodeURIComponent(feedback));
                } else {
                    alert("vous n'avez pas donnez votre avis.");
                }
            }, 2000); // 10000 milliseconds = 10 seconds
        }

        window.onload = function() {
            showAlert();
        };
        
    </script>
</body>
</html>
<?php
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close database connection
    $connection->close();
}
?>
