<?php 
 
session_start();
$host = 'localhost';
$dbname = 'projet_finetude';
$username = 'root';
$password = '';

// Check if the user is logged in
if (!isset($_SESSION['ID_UTIL'])) {
    $userLoggedIn = false;
} else {
    $userLoggedIn = true;
    $userId = $_SESSION['ID_UTIL'];
}

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

if ($userLoggedIn) {
    // Query to retrieve products associated with the specific user
    $query = "SELECT id_adcart, pdtNam_adcart, pdtPrice_adcart, quanti_addcart, pdtmontantTotal_adcart FROM panier WHERE ID_UTIL = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($id_adcart, $pdtNam_adcart, $pdtPrice_adcart, $quanti_addcart, $pdtmontantTotal_adcart);

    if (!$stmt) {
        die('Query failed: ' . $conn->error);
    }
}
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
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CESARO</title>
<link rel="stylesheet" href="panier.css">

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
</head>
<body>
<div class="shopping-cart">
    <div class="title">
        <div><button type="button" class="but" onclick="goBack()">Retour</button></div>
        <div style="display:flex; justify-content:center; color:#f35525; font-weight:bold; font-size:39px;">
            panier 
        </div>
    </div>

    <!-- Conditional rendering based on user login status -->
    <?php if ($userLoggedIn): ?>
        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th>Nom Produit</th>
                    <th>Prix Produit (Dh)</th>
                    <th>Quantité Produit</th>
                    <th>Total (Dh)</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($stmt->fetch()) {
                    echo '
                    <tr>
                        <td>' . $pdtNam_adcart . '</td>
                        <td>' . $pdtPrice_adcart . '</td>
                        <td>' . $quanti_addcart . '</td>
                        <td>' . $pdtmontantTotal_adcart . '</td>
                        <td>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="product_id" value="' . $id_adcart . '">
                                <button type="submit" class="but">Supprimer</button>
                            </form>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center;">
            
            <p style="font-size: 20px; color: black;">Vous devez vous connecter d'abord.</p>
            <div id="loginLink" class="profile" >
              <p style="font-size:10px">
                  cliqué ici pour connecté  
              </p> 
            <a href="../chooselogin.html">
                <i id="profil-icon" style="color:black; font-size:45px;" class="fa fa-user"></i>
                
            </a>
        </div>

        </div>
    <?php endif; ?>
    </div>
    <br>
        <?php if ($userLoggedIn): ?>
            <div id="conf_but">
            <button class="but" ><a style="color:white; text-decoration:none" href="../paiement_page.php">Confirmer</a></button>  </div>
        <?php endif; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</div>
</body>
</html>

<?php
if ($userLoggedIn) {
    $stmt->close();
}
$conn->close();
?>

