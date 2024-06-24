<!DOCTYPE html>
<html lang="fr">
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    
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
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
<link rel="stylesheet" href="details_pdt.css">
<link rel="stylesheet" href="index.js">
</head>
<body>
    
<?php
session_start();
include 'home.php';
?>
<br><br><br>
<!-- content -->
<div id="bod">

<?php
// Database connection settings
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "projet_finetude"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name = isset($_GET['product']) ? $_GET['product'] : '';

if ($product_name) {
    // Fetch product details from the database
    $sql = "SELECT NOM_PDT, DESCR_PDT, PRIX_PDT, image_pdt FROM produit WHERE NOM_PDT = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $product_name);
        $stmt->execute();
        $stmt->bind_result( $NOM_PDT, $DESCR_PDT, $PRIX_PDT, $image_pdt);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
<form method="post" action="addto_cartrobini.php">
  <div class="container" id="conte">
    <div class="images">
      <img name="img_pdt" id="img-details" src="<?php echo $image_pdt; ?>" alt="<?php echo $NOM_PDT; ?>" />
    </div>
    <br>
    <div class="product">
      <p id="pa-det">Robinetterie de CESARO</p>
      <h1 id="h1"><?php echo $NOM_PDT; ?></h1>
      <input type="hidden" name="nom_pdt" value="<?php echo $NOM_PDT; ?>">
      <div class="prix">
        <h2 id="h2"><span id="prix_untrob"><?php echo $PRIX_PDT; ?></span> Dh</h2>
        <input type="hidden" name="prix_pdt" value="<?php echo $PRIX_PDT; ?>">
      </div>
      <p class="desc"><?php echo $DESCR_PDT; ?></p>
      <div class="info-prod">
        <div class="jam3a">
          <div class="inp1">
            <label id="lab-inp" for="input-dimen">nbr de robinet:</label>
            <input name="quant_pdt" class="inp_robin" id="nbr_rob" oninput="calculerMultiplication()" type="number" min="1">
          </div>
        </div>
        <div class="jam3a"></div>
        <div class="inp1" id="inp-chof">
          <label id="lab-inp" for="input-dimen">Montant total:</label>
          <input class="inp_robin" name="tot_pdt" type="number" oninput="checkInput()" id="prix_rob" readonly>
          <div id="message">Dh</div>
        </div>
      </div>
    </div>
    <div class="buttons">
      <button type="submit" class="add">Add to Cart <i id="shopNow" class="fa-solid fa-cart-shopping"></i></button>
    </div>
  </div>
</form>





<script>
   function checkInput() {
    var inputK = document.getElementById('prix_rob').value;
    var messageDiv = document.getElementById("message");

    if (inputK.length > 0) {
      messageDiv.style.display = "block";
    } else {
      messageDiv.style.display = "none";
    }
  }

  setInterval(checkInput, 1000);

  function calculerMultiplication() {
    var input = document.getElementById('nbr_rob');
    var num = parseFloat(document.querySelector('#prix_untrob').textContent);
    var resultInput = document.getElementById('prix_rob');

    var inputValue = parseFloat(input.value);

    if (!isNaN(inputValue)) {
      var result = inputValue * num;
      resultInput.value = result;
    } else {
      resultInput.value = '';
    }
  }
  

</script>
</div>



<br><br><br>
<footer class="footer_area section_padding_130_0">
    <div class="container">
      <div class="row">
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Footer Logo-->
            <div class="foo-1"><img id="foot-log" src="images/logo.png" alt=""></div>
            <p id="brief-intro">nous somme leader dans le domaine de ciramique, robenetrie...</p>
            <!-- Copywrite Text-->
            
            <!-- Footer Social Area-->
<div class="footer_social_area">
                <a href="https://web.facebook.com/cesarosarl/?_rdc=1&_rdr" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/cesaromaroc/?hl=fr" data-toggle="tooltip" data-placement="top" title="" data-original-title="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.threads.net/@cesaromaroc" data-toggle="tooltip" data-placement="top" title="" data-original-title="instagram"><i class="fa fa-threads"></i></a>

               </div>          </div>
        </div>
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title">Reste en contact</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <li class="if"><a id="mood" href="https://wa.me/+212661368986"><i id="icn-tatch" class="fa fa-phone"></i><h6 id="inf-tatch"> +212-661-368986 </h6></a></li>
                <li class="if"><a id="mood" href="mailto:cesaromaroc@gmail.com"><i id="icn-tatch" class="fa fa-envelope"></i><h6 id="inf-tatch" > cesaromaroc@gmail.com </h6></a></li>
                <li class="if"><a id="mood"  href="https://maps.app.goo.gl/mi6tbdsJ59Uiscvq5"><i id="icn-tatch" style="font-size: 32px;" class="fa fa-map-marker"></i><h6 id="inf-tatch"> imm. Chkili, Bd Abdelkrim Al Khattabi, Marrakech</h6></a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title">Support</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <li><a href="index.php">Aceuil</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li style="color: white;">Service: <br>
                    <li class="choix"><i id="cho-icon" class="fa-solid fa-paper-plane"></i><a href="produit_carrelage.php">Carrelage</a></li>
                    <li class="choix"><i id="cho-icon" class="fa-solid fa-paper-plane"></i><a href="produit.php">Robinetterie</a></li>
                    
                </li>
                
                
              </ul>
            </div>
          </div>
        </div>
        <!-- Single Widget-->
        <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title">Horaire de Travaile</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <table id="va">
                    <tr><td style="font-size:18px; text-align:justify; ">Lundi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Mardi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Mercredi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Jeuddi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Vendredi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Samedi :</td><td style="padding-top: 10px; padding-left:42px;">9:00-19:00</td></tr>
                    <tr><td style="font-size:18px; text-align:justify; ">Dimanche :</td><td style="padding-top: 10px; padding-left:42px;">Fermé</td></tr>

                </table>
              </ul>
            </div>
          </div>
        </div>

        <div id="copy">
       <h6 id="dv" style="color:white;"> Copyright © 2024 groupe <a 
style="color:#f35525;" href="">ZHA</a> tous droits réservés.</h6>
        </div>
      </div>
    </div>
  </footer>


<script src="index.js">
   
</script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </body>
    </html>












