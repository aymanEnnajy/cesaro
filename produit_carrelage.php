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

// Fetch products from the database
$sql = "SELECT categorie_prod, NOM_PDT, DESCR_PDT, PRIX_PDT, image_pdt FROM produit";
$result = $conn->query($sql);
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
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="log_out.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
<link rel="stylesheet" href="css/produit.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Lobster&family=Pacifico&family=Righteous&family=Rubik+Puddles&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="index.css">

<title>CESARO</title>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  
  <!-- ***** Preloader End ***** -->


<?php
session_start();
include 'home.php';
?>
<style>
    /* Define fixed dimensions for the product images */
    .product-image img {
        width: 100%; /* Adjust this value as needed */
        height: auto; /* Maintain aspect ratio */
    }

    /* Ensure all product grids have the same height */
    .product-grid {
        display: flex;
        flex-direction: column;
        height: 100%; /* Ensures each grid takes up full height of its container */
    }

    /* Ensure product content takes remaining space */
    .product-content {
        flex: 1;
    }
    #pdt-box{
      padding-top:12px;
    }
</style>
<div class="container" style="padding-top: 190px;">
    <div class="row">
      <div class="titreprod">
        <h2>Service/Produit de Carrelage</h2>
      </div>
        <?php
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
        // Modify the SQL query to fetch products based on the current category
        $current_category = "2"; // Change this to the actual category variable

        $sql = "SELECT ID_PDT, categorie_prod, NOM_PDT, DESCR_PDT, PRIX_PDT, image_pdt FROM produit WHERE categorie_prod = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $current_category);
            $stmt->execute();
            $stmt->bind_result($product_id, $categorie_prod, $NOM_PDT, $DESCR_PDT, $PRIX_PDT, $image_pdt);

            // Display products
            while ($stmt->fetch()) {
                echo '<div class="col-lg-3 col-md-3 col-sm-6" id="pdt-box">';
                echo '    <div class="product-grid">';
                echo '        <div class="product-image">';
                echo '            <img src="' . $image_pdt . '" alt="' . $NOM_PDT . '">';
                echo '            <a href="Detais-prod.php?id=' . $product_id . '" class="Commander"> Commander </a>';
                echo '        </div>';
                echo '        <div class="product-content">';
                echo '            <h3 class="title"><a href="Detais-prod.php?id=' . $product_id . '">' . $NOM_PDT . '</a></h3>';
                echo '            <div class="price">' . $PRIX_PDT . ' DH</div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
            
            $stmt->close();
        } else {
            echo "Error preparing SQL statement: " . $conn->error;
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>




<?php include 'gotop.php'; ?>


  <!-- ***** Header ***** -->
  
  


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
  </footer>
  <script src="index.js">
   
  </script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>