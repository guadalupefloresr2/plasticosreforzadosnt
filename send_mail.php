<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\wamp64\www\PlasticosReforzadosNT\PHPMailer\src\Exception.php';
require 'C:\wamp64\www\PlasticosReforzadosNT\PHPMailer\src\PHPMailer.php';
require 'C:\wamp64\www\PlasticosReforzadosNT\PHPMailer\src\SMTP.php';


$mail = new PHPMailer(true);

try {
    // Obtén los datos del formulario
    $firstname= isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Configuración del servidor de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Reemplaza con tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'pruebasdesarrollo12@outlook.com'; // Reemplaza con tu usuario SMTP
    $mail->Password = 'pruebasdesa1'; // Reemplaza con tu contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo electrónico
    $mail->setFrom('guadalupefloresr@gmail.com', 'Guadalupe');
    $mail->addAddress('pruebasdesarrollo13@example.com', 'Nombre del Destinatario');
    $mail->Subject = 'Asunto del correo';
    $mail->Body = "Nombre: $firstname\nCorreo: $email\nMensaje: $message";

    // Enviar el correo
    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
}
?>