<?php
   // Database connection settings
$servername = "localhost"; // Change if necessary
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "projet_finetude";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Modify the SQL query to fetch the last 8 products of the same category
    $current_category = "1"; // Change this to the actual category variable

    $sql = "SELECT ID_PDT, categorie_prod, NOM_PDT, DESCR_PDT, PRIX_PDT, image_pdt FROM produit WHERE categorie_prod = ? ORDER BY ID_PDT DESC LIMIT 8";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $current_category);
        $stmt->execute();
        $stmt->bind_result($product_id, $categorie_prod, $NOM_PDT, $DESCR_PDT, $PRIX_PDT, $image_pdt);

        // Display products in carousel
        echo '<div id="product-sliderrobb" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner">';
        $counter = 0;
        $num_products_per_slide = 4;
        while ($stmt->fetch()) {
            if ($counter % $num_products_per_slide == 0) {
                $active_class = ($counter == 0) ? 'active' : '';
                echo '<div class="carousel-item ' . $active_class . '">';
                echo '<div class="row">';
            }
            echo '<div class="col-lg-3 col-xs-12 col-sm-6">';
            echo '<div class="product__item wow fadeInUp animated" id="product_itemfadein" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">';
            echo '<div class="product__item__image">';
            echo '<img id="img-carsol" src="' . $image_pdt . '" alt="' . $NOM_PDT . '">';
            echo '</div>';
            echo '<div class="product__item__content">';
            echo '<h4 id="tit-prdcarsoul" style="height:80px; padding-top:20px;" class="product_item_title"><a style="color:#f35525;" href="Detais-prod.php?id=' . $product_id . '">' . $NOM_PDT . '</a></h4>';
            echo '<div class="product_item_price" style="font-size:25px;">' . $PRIX_PDT . ' DH</div>';
            echo '<a href="Detais-prod.php?id=' . $product_id . '" class="btn_product_link">';
            echo '<span>Add to Cart |</span>';
            echo '<i id="sp-prdt" class="fas fa-shopping-cart"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            if (($counter + 1) % $num_products_per_slide == 0 || $counter + 1 == 8) {
                echo '</div>'; // Close row
                echo '</div>'; // Close carousel item
            }
            $counter++;
        }
        echo '</div>'; // Close carousel-inner
        
        // Carousel controls
        echo '<a class="carousel-control-prev" href="#product-sliderrobb" role="button" data-slide="prev">';
        echo '<span id="swiper" class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="carousel-control-next" href="#product-sliderrobb" role="button" data-slide="next">';
        echo '<span id="swiper" class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        
        echo '</div>'; // Close carousel

        echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>';
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
?>
