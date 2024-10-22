<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    $destinatario = "sseebbaassttiiaann838@gmail.com"; // Reemplaza "tucorreo@gmail.com" con tu dirección de correo electrónico real
    
    $asunto = "Nuevo mensaje de contacto desde el sitio web";
    
    $contenido = "Nombre: " . $nombre . "\n";
    $contenido .= "Email: " . $email . "\n";
    $contenido .= "Mensaje: " . $mensaje . "\n";
    
    // Para enviar un correo HTML, deberás establecer la cabecera Content-type
    $cabeceras = "MIME-Version: 1.0" . "\r\n";
    $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // Enviar correo
    mail($destinatario, $asunto, $contenido, $cabeceras);
    
    // Redirigir a una página de confirmación
    header('Location: confirmacion.html');
}
?>
