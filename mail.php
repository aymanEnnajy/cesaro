<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Chemin vers l'autoload de PHPMailer

// Création d'une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cesaro.2024a@gmail.com';
    $mail->Password = '1Cesaro@2024';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinataire, sujet, contenu et en-têtes de l'email
    $mail->setFrom('cesaro.2024a@gmail.com', 'Votre Nom');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Envoi de l'email
    $mail->send();
    echo 'Email envoyé avec succès !';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'email : ', $mail->ErrorInfo;
}
?>
