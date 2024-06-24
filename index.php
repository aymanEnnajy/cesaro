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

  <!-- ***** Header ***** -->
  
  
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slider-1-1.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/Design sans titre (4).png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/slider-1-5.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/slider-1-3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--carte petit-->

  <div class="fun-facts" id="fun">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3">
                <div class="counter" id="conter1">
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                  <img id="icon-home" src="images/livraison-rapide.png" alt="">
                   <p class="count-text " id="count">LIVRAISON EN 24H À 48H*</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="counter" id="conter1">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <img id="icon-home" src="images/cadeau.png" alt="">
                  <p class="count-text " id="count">LIVRAISON GRATUITE DÉS 199 DH *                  </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="counter" id="conter1">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <img id="icon-home" src="images/paiement-securise.png" alt="">
                  <p class="count-text " id="count">PAIEMENT PAR CARTE SÉCURISÉ                  </p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="counter" id="conter1">
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <img id="icon-home" src="images/payer.png" alt="">
                  <p class="count-text " id="count">PAIEMENT EN ESPÈCE À LA LIVRAISON ​  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--des info-->
  <div class="section best-deal" id="sec-part2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Best Deal</h6>
            <h2>Nos Produit que nous offre</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Carrelage</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Robinetterie & sanitaire</button>
                  </li>
                  
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total produit<span>+ 500  </span></li>
                          <li>nombre couleur <span>+100 </span></li>
                          <li>Acompagnement <span>Yes</span></li>
                          <li>Processus de paiement <span>Bank/ cash</span></li>
                          <li>Livraison <span>Yes</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img id="img_sli6d" src="images/slid6.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Informations supplémentaires sur carrelage de CESARO</h4>
                      <p> CESARO vous propose plusieur produit de carrelage du sol et mur avec trés bon qualité par rapport au prix 
                      <br><br> On a plus de 500 type de produit avec plusieur couleur. <br> on vous donne le choix et l'acompagnement pour obtenir le meilleur choix avec n'import quantité<br>vous pouvez payer sur place en cash ou par une virement bancaire </p>
                      <div class="icon-button">
                        <a href="produit_carrelage.php"><i class="fa fa-calendar"></i> voire nos produit</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total produit<span>+ 500  </span></li>
                          <li>nombre couleur <span>+100 </span></li>
                          <li>Acompagnement <span>Yes</span></li>
                          <li>Processus de paiement <span>Bank/ cash</span></li>
                          <li>Livraison <span>Yes</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="images/SLID7.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Informations supplémentaires sur robinetterie et sanitaire de CESARO</h4>
                      <p> CESARO vous propose plusieur produit de robinetterie et sanitaire pour salle de bain et douche et cuisine et mur avec trés bon qualité par rapport au prix 
                      <br><br>On a plus de 500 type de produit avec plusieur couleur. <br>on vous donne le choix et l'acompagnement
                       pour obtenir le meilleur choix avec n'import quantité<br>vous pouvez payer sur place en cash ou par une virement bancaire </p>
                      <div class="icon-button">
                        <a href="produit.php"><i class="fa fa-calendar"></i> voire nos produit</a>                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="carouselExampleIndicators" style="background-color: #fafafa;" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img id="slid-petit"  src="images/gallery-slide-1-1.jpg" alt="">
            <a href="produit_carrelage.html"><img src="images/carrelage.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2>Meuilleur carrelage de mur  
              &amp; de sol</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Quoi vous bénéfice ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 <strong>CESARO</strong>  vous propose le meilleur carrelage de mur et de sol avec la meilleur qualité et le moindre prix et avec plusieurs choix</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  comment ca marche ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <strong>CESARO</strong>Vous propose de choisir le carrelage que vous aime avec les dimention nécessaire et nous vous offre la livraison.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pourquoi nous ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <strong>CESARO </strong>Propose un produit qu'il est de qualité par rapport au prix et vous offre la livraisongratuit  et tres bon service client
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="images/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4>Dimention<br><span>jusqu'à 10 000m²</span></h4>
              </li>
              <li>
                <img src="images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Facturation<br><span> facture surplace </span></h4>
              </li>
              <li>
                <img src="images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>tout methode de paiement existe</span></h4>
              </li>
              <li>
                <img src="images/shipping-and-delivery.png" alt="" style="max-width: 52px;">
                <h4>Livraison<br><span>livraison gratuit</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
      <div class="carousel-item">
        <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img id="slid-petit" src="images/slid5.jpg" alt="">
            <a href="produit_carrelage.html"><img src="images/carrelage.png" alt="" style="max-width: 60px; padding: 0px;"></a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Featured</h6>
            <h2>sanitaire et robinetterie</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Quoi vous bénéfice ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                 <strong>CESARO</strong>  vous propose le meilleur sanitaire et robinetterie avec la meilleur qualité et le moindre prix et avec plusieurs choix</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  comment ca marche ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <strong>CESARO</strong>Vous propose de choisir sanitaire et robinetterie que vous aime avec les dimention nécessaire et nous vous offre la livraison  <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Pourquoi nous ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                   <strong>CESARO</strong>Propose un produit qu'il est de qualité par rapport au prix et vous offre la livraisongratuit  et tres bon service client
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <img src="images/toilette.png" alt="" style="max-width: 52px;">
                <h4>Produit<br><span>avec quantité  illimité et bon prix </span></h4>
              </li>
              <li>
                <img src="images/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4>Facturation<br><span> facture surplace </span></h4>
              </li>
              <li>
                <img src="images/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Paiement<br><span>tout methode de paiement existe</span></h4>
              </li>
              <li>
                <img src="images/shipping-and-delivery.png" alt="" style="max-width: 52px;">
                <h4>Livraison<br><span>livraison gratuit</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
      
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  

  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Video store</h6>
            <h2>voire notre magasin</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img id="partVideo" src="images/vid.jpg" alt="">
            <a href="https://web.facebook.com/reel/3643704819238098" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4" >
                <div class="counter" id="counter-morb">
                  
                  <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                   <p class="count-text ">construire<br> la confiance</p>
                </div>
              </div>
              <div class="col-lg-4" >
                <div class="counter" id="counter-morb">
                  
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">années<br> d'expérience</p>
                </div>
              </div>
              <div class="col-lg-4" >
                <div class="counter" id="counter-morb">
                  
                  <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                  <p class="count-text ">Prix remportés <br>en 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 
  <section>
     

    <div class="container" id="cont">
      <div class="section-heading" style="margin-top:130px;">
        <h6>| best</h6>
        <h2 id="tit-carso">Derniere produit carrelage</h2>
      </div>
      
     <!--slider produit php-->
    <?php
    include 'carsoul.php';
    ?>

      <!--slider produit derniere LIGNE-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </div>

    
  </section>

  <section>
     

    <div class="container"  id="cont1" style="margin-top: -140px;" >
      <div class="section-heading" >
        <h6>| best</h6>
        <h2 id="tit-carso">Derniere produit Robinetterie et sanitaire</h2>
      </div>
     <?php
      include 'carsoulrobini.php';
      ?>
    </div>

    
  </section>

  


  <div class="contact section" style="margin-top: -155px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Contactez Nous</h6>
            <h2>Reste en contact</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13584.663035426109!2d-8.0175565!3d31.6566845!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafec241fb8d8db%3A0x2b99a359bc5320da!2sCESARO%20MAROC%20Carrelage%20Sanitaire%20Robinetterie!5e0!3m2!1sfr!2sma!4v1711673835266!5m2!1sfr!2sma" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
               </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="assets/images/phone-icon.png" alt="" style="max-width: 52px;">
                <h6>0661-368986<br><span>Numéro de téléphone</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="assets/images/email-icon.png" alt="" style="max-width: 52px;">
                <h6 id="h6email">cesaromaroc@gmail.com<br><span>Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="phpcontact.php"  method="POST">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">Nom complete</label>
                  <input type="name" name="nom" id="nom" placeholder="Votre Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email </label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre E-mail..." required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">telephone</label>
                  <input type="tel" name="tel" id="subject" placeholder="+212..." required >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Message</label>
                  <textarea name="message" id="message" placeholder="Votre Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Envoyer Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 <?php include 'gotop.php'; ?>
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