<?php
session_start();
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<li><a id='nav-b' href='index.html'>aceuil</a></li>
<li><a id='nav-b' href='about.html'>a propos</a></li>
<li> <a id='nav-b' href='formulaire.html'>service</a>


</li>
<li><a id="nav-b" href="contact.html">contact</a></li><br>
if (isset($_SESSION['user_id'])) {
    // User is logged in
    echo '<a href="logout.php">Logout</a>';
} else {
    // User is not logged in
    echo '<a href="login.php">Login</a>';
}
</body>
</html>



?>