<?php

include "configuracion-de-correo.php";

$mail->ClearAllRecipients();

$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("emiliano@castelancarpinteyro.com");
$mail->AddCC("newsletter@castelancarpinteyro.com");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'Prueba de servidor de correos';

$msg = "<h1>¡Hola!</h1>
<p>Si estás viendo este correo, significa que Dante Castelán Carpinteyro logró reactivar el servidor de correos automáticos de scripts.</p>
<p>Si está en spam, por favor informa que no lo es.</p>
";

$mail->Body = $msg;
$mail->Send();
