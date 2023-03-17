<?php
#include "correos/PHPMailer.php";
#include "correos/SMTP.php";
#include "correos/Exception.php";

include "vendor/autoload.php";

include "correos/configuracion-de-correo.php";
include "php scripts/secrets.php";

$asunto = $_GET['asunto'];
$mensaje = $_GET['mensaje'];
$destinatario = $_GET['destinatario'];

$mail->ClearAllRecipients();
$mail->AddAddress("$destinatario"); #("destinatario@email.com");
$mail->AddCC("dante@castelancarpinteyro.com"); #("concopia2@email.com");
$mail->AddCC("jeremy.hdez9@gmail.com"); #("concopia1@email.com");
$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = $asunto;
$msg = $mensaje;
$mail->Body = $msg;
$mail->Send();
