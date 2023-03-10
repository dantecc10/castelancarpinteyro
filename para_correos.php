<?php
#include "correos/PHPMailer.php";
#include "correos/SMTP.php";
#include "correos/Exception.php";

include "vendor/autoload.php";

include "correos/configuracion-de-correo.php";

$mail->ClearAllRecipients();

$mail->AddAddress("dantecc10@gmail.com"); #("destinatario@email.com");
$mail->AddCC("jeremy.hdez9@gmail.com"); #("concopia1@email.com");
$mail->AddCC("d.castelanc.chg.2023@cecytepuebla.edu.mx"); #("concopia2@email.com");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'asunto del mensaje';

$msg = "<h2>Contenido mensaje HTML:</h2>
<p>Contenido</p>
<p>Más Contenido...</p>
";

$mail->Body = $msg;
$mail->Send();
