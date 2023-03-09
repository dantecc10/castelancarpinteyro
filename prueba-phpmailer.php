<?php

use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "dantecc10@gmail.com";
$mail->Password = "DarkseidPower22!!";
$mail->SMTPSecure = "tls";
$mail->Port = "587";

$mail->setFrom('dantecc10@gmail.com', 'Probador de Scripts');
$mail->addAddress('jeremy.hdez9@gmail.com');
$mail->addReplyTo('dante@castelancarpinteyro.com');

$mail->isHTML(true);

$mail->Subject = 'Pruebita';
$mail->Body = '<h1>Correo de prueba</h1><p>Este correo debe llegar porque me pondrá contento.</p>';
$mail->AltBody = 'Correito de prueba (modo plano)';

if (!$mail->send()) {
    echo 'El mensaje no se pudo enviar.';
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje se envió correctamente';
}
