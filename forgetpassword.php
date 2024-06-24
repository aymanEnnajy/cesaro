<?php
/*

session_start();

$log = file_get_contents('login.html');
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
$home = file_get_contents('index.php');
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if($connexion->connect_error){
    die("Pas de connexion: " . $connexion->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input
    $email =  $_POST["email_oub"];
    $phone =  $_POST["tel_oub"];
    $query = "SELECT Password_uti FROM util WHERE email_util='$email' AND TEL_UTLI= '$phone'";
    $result = $connexion->prepare($query);
    // Check if both email and phone are provided
    if (!$result) {
        echo 'Please enter both email and phone number.';
    } else {
        // Query to check user existence and retrieve reset code
       
       $reset_code = $row[$query];
       
       
            // Display reset code in a message box
            echo "<script>
                alert('Your reset code is: $reset_code');
                window.location.href = 'login.html';
         
                </script>";
        } 
    
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and phone number from the form
    $email = $_POST['email_oub'];
    $phone_number = $_POST['tel_oub'];

    // Database connection parameters
   
$log = file_get_contents('login.html');
$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données
$home = file_get_contents('index.php');
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if($connexion->connect_error){
    die("Pas de connexion: " . $connexion->connect_error);
}

    // Prepare and bind
    $stmt = $connexion->prepare("SELECT Password_uti FROM util WHERE email_util = ? AND TEL_UTLI = ?");
    $stmt->bind_param("ss", $email, $phone_number);

    // Execute the query
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();

    if ($password) {
        // If the password is found, show it in a message box
       /* echo "<script type='text/javascript'>alert('Votre mot de passe est: " . $password . "');
        window.location.href = 'login.html';
        </script>";*/
        echo' <head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
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
        <div class="card">
        <p class="lock-icon"><i id="icon" class="fas fa-lock"></i></p>
        <h2>votre mot de passe est:</h2>';
        echo'<h1 style="color:#f35525; font-size:42px">';
       echo $password;
       echo'</h1>';
       echo' <div style="display:flex; justify-content:space-evenly; ">
       <button type="submit" name="submit"> <a href="login.html">page de connection</a></button>

   </div>';
      echo'  <style>
        :root{
            --color1:#000000;
            --color2:#3E3636 ;
            --color3: #D72323;
            --color4: #F5EDED;
            --colbg: #ffeee9;
            --colecri:#f35525;
            
          }    
          a{
            text-decoration:none;
            color:var(--colbg);
        } 
        a:hover{
            color: var(--colecri);
        }
        body {
            
            background-color: var(--color2);
            background-image:
                radial-gradient(at 61% 4%, var(--color1) 0px, transparent 50%),
                radial-gradient(at 75% 66%, var(--colbg) 0px, transparent 50%),
                radial-gradient(at 98% 88%,var(--color1) 0px, transparent 50%),
                radial-gradient(at 23% 16%, var(--colbg) 0px, transparent 50%),
                radial-gradient(at 95% 65%,var(--color1) 0px, transparent 50%),
                radial-gradient(at 10% 79%, var(--colbg) 0px, transparent 50%),
                radial-gradient(at 85% 58%, var(--color2) 0px, transparent 50%);
            background-repeat: no-repeat;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15rem 0;
        }
        #icon{
            color: var(--color1);
        }
        h2{
            color: var(--color1);
        }
        p{
            color: var(--color2);
        }
        ::placeholder{
            color: var(--color2);
        }
        .card {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: var(--colbg);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 40px;
        }
        .lock-icon {
            font-size: 3rem;
        }
        h2 {
            font-size: 1.5rem;
            margin-top: 10px;
            text-transform: uppercase;
        }
        p {
            font-size: 14px;
        }
        .passInput {
            margin-top: 15px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--colecri);
            font-size: 15px;
            color: white;
            outline: none;
        }
        button:hover{
            color: var(--colecri);
            background-color: var(--color4);
            zoom: 1.1;
            box-shadow: 12px 6px 2px #ffa78c;
        }
        button {
            margin-top: 15px;
            
            background-color: var(--colecri);
            color: var(--colbg);
            border: 2px solid var(--colecri);
            padding: 10px;
            text-transform: uppercase;
        }
        </style>';
    } else {
        // If no match is found, show an error message
        echo "<script type='text/javascript'>alert('Email ou numéro de Téléphone incorrecte.');
        window.location.href = 'forgetpass.php';
        </script>";
    }

    // Close the statement and connection
    $stmt->close();
    $connexion->close();
}

?>