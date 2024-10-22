<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar los inputs del formulario
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);

    if ($email === false) {
        echo "<div class='mensaje'><h1>Error en el email</h1>";
        echo "<p>La dirección de correo no es válida. Por favor, intenta de nuevo.</p></div>";
        exit;
    }

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';    // Configuración SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'miguel.seb.san@gmail.com';
        $mail->Password   = 'Lilmiguel03';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y destinatarios
        $mail->setFrom($email, $nombre);
        $mail->addAddress('sseebbaassttiiaann838@gmail.com');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto desde el sitio web';
        $mail->Body    = "Nombre: $nombre<br>Email: $email<br>Mensaje: $mensaje";

        // Enviar el correo
        $mail->send();
        header('Location: confirmacion.html'); 
        exit;
    } catch (Exception $e) {
        echo "<div class='mensaje'><h1>Error al Enviar</h1>";
        echo "<p>Hubo un problema al enviar tu mensaje. Error: {$mail->ErrorInfo}</p></div>";
    }
}
?>
