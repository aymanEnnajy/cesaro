<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_finetude";

$conn = mysql_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysql_error());
}

$db_selected = mysql_select_db($dbname, $conn);
if (!$db_selected) {
    die("Can't use $dbname : " . mysql_error());
}

$userId = $_SESSION['ID_UTIL']; // Assuming the user ID is stored in the session

$sql = "SELECT pdtNam_adcart, pdtPrice_adcart, quanti_addcart,pdtmontantTotal_adcart, produit.image_pdt FROM panier
JOIN produit ON panier.pdtNam_adcart = produit.NOM_PDT	
WHERE panier.ID_UTIL = $userId";
$result = mysql_query($sql);

if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$items = '';
$totalPrice = 0;
$itemCount = 0;


while ($row = mysql_fetch_assoc($result)) {
    $name = htmlspecialchars($row['pdtNam_adcart']);
    $price = htmlspecialchars($row['pdtPrice_adcart']);
    $quantity = htmlspecialchars($row['quanti_addcart']);
    $image = htmlspecialchars($row['image_pdt']);
    $priceTot=htmlspecialchars($row['pdtmontantTotal_adcart']);
    $totalPrice += $priceTot;
    $itemCount += $quantity;

    $items .= "
    <div class='row item'>
        <div class='col-4 align-self-center'><img id='im-pai' class='img-fluid' src='$image'></div>
        <div class='col-8'>
           <div id='flot'><h5 style='color:white;' >$priceTot dh</h5></div>
            <div class='row'><b>$price dh</b></div>
            <div class='row ' id='textmuted'>$name</div>
            <div class='row'>Qty: $quantity</div>
        </div>
    </div>";
    
}

mysql_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="paiement.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Lobster&family=Pacifico&family=Righteous&family=Rubik+Puddles&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/templatemo-villa-agency.css">
<title>CESARO</title>
<link rel="stylesheet" href="index.scss">
<link rel="stylesheet" href="details_pdt.css">
</head>
<body>
    <div class="paiemtgolb">
    <div class="card" id="card-pai">
        <div class="card-top border-bottom text-center">
             <a id="link-paiem" href="index.php"> Back to shop</a>
            <span id="logo"><img src="images/logo.png" alt=""></span>
        </div>
        <div class="card-body">
            <div class="row upper" id="upper">
                <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
                <span><i class="fa fa-check-circle-o"></i> Order details</span>
                <span id="payment"><span id="three">3</span>Payment</span>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="left border" id="left-bo">
                        <div class="row">
                            <span class="header">Paiement</span>
                            <div class="content-but">
                                
                                    
                                        <h4 style="color:white;">info livraison</h4>
                    
                                    <div id="button2"><img src="images/paypal.jpeg" alt=""></div>
                            </div>
                            <div id="content1" style="display: block;">
                            <form id="deliveryForm" action="formul_livraison.php" method="post">
                                <span>NOM du destinataire</span>
                                <input placeholder="fahd aalami" name="nom" id="name" required>
                                <span>Adresse de livraison</span>
                                <input name="adresse" placeholder="massira2 residance aanbar" id="address" required>
                                <div class="row" style="margin-left:12px;">
                                    <div class="col-4">
                                        <span>NUMÉRO Telephone:</span>
                                        <input name="tel" placeholder="06 00 85 47 00" id="phone" required>
                                    </div>
                                    <br>
                                    <div class="col-4">
                                        <span>code postal:</span>
                                        <input name="codepostal" id="postalCode" required>
                                    </div>
                                    <br>
                                </div><br>
                                <div id="cash">
                                    <div>
                                        <input name="cashondelevery" id="inp_rad" value="paiement a la livraison" type="checkbox" required>
                                        <input type="hidden" name="total" id="total-price-input" value="<?php echo $totalPrice; ?>">
                                        <input type="hidden" name="nom_pdts" id="total-price-input" value="<?php echo $name; ?>">

                                        <input type="hidden" name="ID_UTIL" value="<?php echo $userId; ?>"> <!-- Hidden input for user ID -->
                                    </div>
                                    <h6 style='color:white;'>Paiement à la livraison</h6>
                                </div>
                                <!-- Button -->
                                <button type="submit" class="btn" id="bot-pai">Place order</button>
                            </form>

                                <button id="nextButton" onclick="showContent2()">Paiment par carte</button>
                            </div>
                            <div id="content2" style="display: none;">
                                <br><br>
                              
<!--paypal-->
<div class="col text-right" id="total-price"><b><?php echo $totalPrice; ?> dh</b></div>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=ARihLWW7p_qff_fIs8w6Dzoxz_9KxNmlZa6SHBcAZLDn1vmID00O9pX2C6kZRLqVInLIT_Wys3C7W0Bs"></script>

<script>
    // Get the total price from the HTML
    var totalPriceElement = document.getElementById('total-price');
    var totalPriceText = totalPriceElement.innerText; // Assuming the text content contains the total price
    var totalPriceDh = parseFloat(totalPriceText.replace(' dh', '').replace(',', '')); // Remove ' dh' and commas, convert to float
    var conversionRate = 0.10; // Example conversion rate: 1 DH = 0.10 USD

    // Convert the total price to USD
    var totalPriceUSD = totalPriceDh * conversionRate;

    // Render the PayPal button
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currency_code: 'USD', // Set currency code to USD
                        value: totalPriceUSD.toFixed(2) // Pass the converted total price as USD, rounded to 2 decimal places
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Perform additional actions after successful payment
            });
        }
    }).render('#paypal-button-container'); // Replace 'paypal-button-container' with the ID of your container
</script>

<!-- Container for PayPal button -->
<div id="paypal-button-container"></div>


<!--end paypal-->

<!--code for paiement-->

<!---->
    <button id="previousButton" onclick="showContent1()">Previous</button>
                            <script>


/*ouvrir next and previous  */

     function checkFormFilled() {
            const name = document.getElementById('name').value.trim();
            const address = document.getElementById('address').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const postalCode = document.getElementById('postalCode').value.trim();

            if (name && address && phone && postalCode) {
                document.getElementById('nextButton').style.display = 'block';
            } else {
                document.getElementById('nextButton').style.display = 'none';
            }
        }

        // Add event listeners to input fields
        document.getElementById('name').addEventListener('input', checkFormFilled);
        document.getElementById('address').addEventListener('input', checkFormFilled);
        document.getElementById('phone').addEventListener('input', checkFormFilled);
        document.getElementById('postalCode').addEventListener('input', checkFormFilled);

        // Function to show content2
        function showContent2() {
            document.getElementById('content1').style.display = 'none';
            document.getElementById('content2').style.display = 'block';
            document.getElementById('previousButton').style.display = 'block';
        }

        // Function to show content1
        function showContent1() {
            document.getElementById('content2').style.display = 'none';
            document.getElementById('content1').style.display = 'block';
        }
                                // 2. Afficher le bouton PayPal
                                paypal.Buttons().render("#paypal-boutons");


                                
                                        document.getElementById("button1").addEventListener("click", function() {
                                        document.getElementById("content1").style.display = "block";
                                        document.getElementById("content2").style.display = "none";
                                        });

                                        document.getElementById("button2").addEventListener("click", function() {
                                        document.getElementById("content1").style.display = "none";
                                        document.getElementById("content2").style.display = "block";
                                        });

                            </script>
                            </div>

                            
                        </div>
                        
                    </div>                        
                </div>
                <div class="col-md-5">
        <div class="right border" id="right-bord">
            <div class="header">Récapitulatif de la commande</div>
            <p id="para-quant"><?php echo $itemCount; ?> items</p>
            <?php echo $items; ?>
            <hr>
            <div class="row lower">
                <div class="col text-left">Subtotal</div>
                <div class="col text-right"><?php echo number_format($totalPrice, 2); ?> dh</div>
                
            </div>
            <div class="row lower">
                <div class="col text-left">Delivery</div>
                <div class="col text-right">Free</div>
            </div>
            <div class="row lower">
                <div class="col text-left"><b>Total to pay</b></div>
                <div class="col text-right" name="total" id="total-prices"><b><?php echo $totalPrice; ?> dh</b></div>
                
            </div>
           
        </div>
    </div>
            </div>
        </div>
        
     <div>
    </div>
    </div>
</div>
<script>
// Function to get the price from the div
function getPrice() {
    // Get the content of the div
    let priceText = document.getElementById('total-price').innerText;
    // Remove the dollar sign and convert to a number
    let price = parseFloat(priceText.replace('$', ''));
    return price;
}
</script>
<script src="index.js">
    
   
</script>
<script src="https://www.paypal.com/sdk/js?client-id=SANDBOX_CLIENT_ID"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </body>
    </html>

