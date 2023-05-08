<?php
#include "correos/PHPMailer.php";
#include "correos/SMTP.php";
#include "correos/Exception.php";

include "../vendor/autoload.php";

include "../correos/configuracion-de-correo.php";

$mail->ClearAllRecipients();

#$mail->AddAddress("o.moralesm.chg.2023@cecytepuebla.edu.mx"); #("concopia2@email.com");
#$mail->AddAddress("osiel.mm@gmail.com"); #("concopia2@email.com");
$mail->AddAddress("dantecc10@gmail.com"); #("concopia2@email.com");
$mail->AddCC("dantecc10@gmail.com"); #("destinatario@email.com");
$mail->AddCC("jeremy.hdez9@gmail.com"); #("concopia1@email.com");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'Se viene un ataque';

$ip = $_SERVER['REMOTE_ADDR'];

$msg = ("<h1>Tiempos de tormenta se acercan</h1>
<h2>Iustus iudex</h2>
<br>
<p><b>Qué bien que has abierto este email...</b></p>
<br>
<p><i>Dies irae, dies illa</i></p>
<p><i>Solvet saeclum en favilla</i></p>
<p><i>Teste David cum Sybilla</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Quando iudex est venturus</i></p>
<p><i>Cunta stricte discussurus</i></p>
<p><i>Dies irae, dies illa</i></p>
<p><i>Solvet saeclum en favilla</i></p>
<p><i>Teste David cum Sybilla</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Quando iudex est venturus</i></p>
<p><i>Cuncta stricte discussurus</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Dies irae, dies illa</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Dies irae, dies illa</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Quantus tremor est futurus</i></p>
<p><i>Quando iudex est venturus</i></p>
<p><i>Cuncta stricte discussurus</i></p>
<p><i>Cuncta stricte (cunta stricte) stricte discussurus</i></p>
<p><i>Cuncta stricte (cunta stricte) stricte discussurus</i></p>
<br>
<br>
<br>
<p>Esto fue hecho para tí, Osiel, habéis desconfiado de mi script de correos; me has tachado de terrorista digital; de atacante; de persona desalmada que sólo busca hacer daño con la tecnología; ¡qué despropósito!</p>
<p>Esto está escrito en HTML, pero, ¡por favor! ¿Qué tipo de virus puede crear un estudiante de la carrera técnica en programación del CECyTE (¡del CECyTE!)?</p>
<p>Tu ip es: " . $ip . ". Esto apenas empieza...</p>
");

$mail->Body = $msg;
$mail->Send();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenaza</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9258502939818184"
     crossorigin="anonymous"></script>
    
    <script>
        alert("Revisa tu correo.")
        window.close();
    </script>
</head>

<body>

</body>

</html>