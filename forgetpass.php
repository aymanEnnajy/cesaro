
<!DOCTYPE html>
<!--<html>
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
     Additional CSS Files -->

    <!--
    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail= new PHPMailer(true);
try{
    $mail->SMTPDebug=0;
    $mail->isSMP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPauth=true;
    $mail->Username='med.en1990a@gmailcom';
    $mail->password='password';
    $mail->SMTPSecure= PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port=587;
}

</body>-->
<!doctype html>
<html lang="en">
<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Forgot Password</title>
</head>
<body>
    <style>
       
        #titre{
            text-align: center;
            font-size: 41px;
            font-style: italic;
            font-family: math;
            color: #f35525;
        }
        .form{
            display:flex;
            justify-content:center;
        }
    </style>
    
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/forgetpassword.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">

  
    <title>CESARO</title>
</head>
<body>
    <div class="card">
        <p class="lock-icon"><i id="icon" class="fas fa-lock"></i></p>
        <h2>Mot de pass oublier?</h2>
        <p>Vous pouvez réinitialiser votre mot de passe ici</p>
    <form method="post" action="forgetpassword.php"class="forms">
       <div>
             <input  class="passInput" type="email" id="email_oub" placeholder="Email" name="email_oub"  required>
        </div> <br>
        <div>
        
           <input class="passInput" type="tel" id="tel_oub" placeholder="Telephone" name="tel_oub" required>
        </div> <br>
       <div style="display:flex; justify-content:space-evenly;">
           <button type="submit" name="submit">envoyer demande</button>

       </div>
    </form>
       
    </div>
  
</body>
</html>
</html>