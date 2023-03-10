<?php
#include "correos/PHPMailer.php";
#include "correos/SMTP.php";
#include "correos/Exception.php";

include "vendor/autoload.php";

include "correos/configuracion-de-correo.php";

$mail->ClearAllRecipients();

$mail->AddAddress("dantecc10@gmail.com"); #("destinatario@email.com");
$mail->AddCC("o.moralesm.chg.2023@cecytepuebla.edu.mx"); #("concopia2@email.com");
$mail->AddCC("jeremy.hdez9@gmail.com"); #("concopia1@email.com");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'Se viene un ataque';

$msg = "<h1>Tiempos de tormenta se acerca</h1>
<h2>Iustus iudex</h2>
<p>Dies irae, dies illa</p>
<p>Solvet saeclum en favilla</p>
<p>Teste David cum Sybilla</p>
<p>Quantus tremor est futurus</p>
<p>Quando iudex est venturus</p>
<p>Cunta stricte discussurus</p>
<p>Dies irae, dies illa</p>
<p>Solvet saeclum en favilla</p>
<p>Teste David cum Sybilla</p>
<p>Quantus tremor est futurus</p>
<p>Quando iudex est venturus</p>
<p>Cuncta stricte discussurus</p>
<p>Quantus tremor est futurus</p>
<p>Dies irae, dies illa</p>
<p>Quantus tremor est futurus</p>
<p>Dies irae, dies illa</p>
<p>Quantus tremor est futurus</p>
<p>Quantus tremor est futurus</p>
<p>Quando iudex est venturus</p>
<p>Cuncta stricte discussurus</p>
<p>Cuncta stricte (cunta stricte) stricte discussurus</p>
<p>Cuncta stricte (cunta stricte) stricte discussurus</p>
<br>
<br>
<br>
<p>Esto fue hecho para tí, Osiel, habéis desconfiado de mi script de correos; me has tachado de terrorista digital; de atacante; de persona desalmada que sólo busca hacer daño con la tecnología; ¡qué despropósito!</p>
<p>Esto está escrito en HTML, pero, ¡por favor! ¿Qué tipo de virus puede crear un estudiante de la carrera técnica en programación del CECyTE (¡del CECyTE!)?</p>
<p>Esto apenas empieza</p>
";

$mail->Body = $msg;
$mail->Send();
