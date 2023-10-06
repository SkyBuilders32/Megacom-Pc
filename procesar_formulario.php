<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    
    $mail->SMTPAuth   = true;
    $mail->Username   = 'Julianrexmod@gmail.com';
    $mail->Password   = 'ftlprnslhfjfvbmb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('Julianrexmod@gmail.com', 'Julian');
    $mail->addAddress('alfrejavier@gmail.com', 'Destinatario');
    $mail->Subject = 'Nuevo mensaje de contacto desde tu sitio web';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    $mail->isHTML(true);
    $mail->Body = "
        <html>
        <head>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f0f0f0;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    background-color: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    max-width: 600px;
                    margin: 20px auto;
                }
                h1 {
                    color: #333;
                    font-size: 28px;
                    text-align: center;
                }
                p {
                    color: #555;
                    font-size: 16px;
                    line-height: 1.5;
                }
                .footer {
                    background-color: #f0f0f0;
                    padding: 10px;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>¡Gracias por contactarnos!</h1>
                <p>Esto es un correo de prueba enviado desde nuestro formulario de contacto.</p>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mensaje:</strong></p>
                <p>$mensaje</p>
            </div>
            <div class='footer'>
                <p>No responda a este correo electrónico. Si tiene alguna pregunta, contáctenos en <a href='mailto:contacto@tusitio.com'>contacto@tusitio.com</a>.</p>
            </div>
        </body>
        </html>
    ";

    // Envía el correo electrónico
    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>
