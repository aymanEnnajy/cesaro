<!-- navbar.php -->

<?php
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload file

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_smtp_username';
    $mail->Password = 'your_smtp_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email content
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress($to);
    $mail->Subject = 'Password Reset Link';
    $mail->Body = 'Please click the following link to reset your password: http://yourdomain.com/reset_password.php?email='.$email.'&token='.$reset_token;

    // Send email
    $mail->send();
    echo 'Password reset link has been sent to your email address.';
} catch (Exception $e) {
    echo 'Email sending failed: ' . $mail->ErrorInfo;
}*/

$serveur = "localhost"; // Serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "projet_finetude"; // Nom de la base de données

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if($connexion->connect_error){
    die("pas de connexion". $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $new_password = $_POST["new_password"];

    // Mettre à jour le mot de passe pour l'utilisateur associé au token
    $sql = "UPDATE util SET Password_uti = '$new_password', verify_token = NULL WHERE verify_token = '$token'";
    
    if ($connexion->query($sql) === TRUE) {
        echo "Mot de passe réinitialisé avec succès.";
    } else {
        echo "Erreur lors de la réinitialisation du mot de passe : " . $connexion->error;
    }
}

$connexion->close();
?>
    ?>
