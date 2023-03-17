<?php
#include "correos/PHPMailer.php";
#include "correos/SMTP.php";
#include "correos/Exception.php";

include "vendor/autoload.php";

include "correos/configuracion-de-correo.php";
include "php scripts/secrets.php";

#$asunto = $_GET['asunto'];
#$mensaje = $_GET['mensaje'];
#$destinatario = $_GET['destinatario'];

$destinatario = 'dantecc10@gmail.com';
$asunto = 'Credenciales del servidor para el equipo 4.';
$mensaje = 'Hola, Dana Paola, a través de este correo te envío las credenciales de acceso al servidor de tu equipo, el número 4. El usuario será prog4b4 y la contraseña es Prog4B4!!. Ingresa desde prog5a.com:8443. Atentamente, Dante Castelán Carpinteyro.';

$mail->ClearAllRecipients();
$mail->AddAddress($destinatario);
$mail->AddCC('dante@castelancarpinteyro.com');
$mail->AddCC('jeremy.hdez9@gmail.com');
$mail->IsHTML(true);
$mail->Subject = $asunto;
$msg = $mensaje;
$mail->Body = $msg;
$mail->Send();
