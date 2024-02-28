<?php

include_once "../vendor/autoload.php";
use chillerlan\QRCode\QRCode;

if (isset($_GET['url'])) {
    
    // Define el nombre del archivo del código QR
    $name = "qr-" . time() . ".png";
    
    // Define la ruta del archivo del código QR
    $path = (__DIR__ . "/generated-qrs/" . $name);
    // Crea una instancia de QRCode
    $qrcode = new QRCode;

    // Genera el código QR y guarda la imagen en la ruta de salida
    $qrcode->render($_GET['url'], $path);
    
    // Redirige a la página que muestra el código QR generado
    //header("Location: ../generated-qr.php?file=$name");
echo(var_dump($path));
echo(var_dump($name));
echo("<img src='$path'>")
} else {
    // Redirige de vuelta a la página anterior si no se proporcionó una URL
    header("Location: ../qr-code.php");
}
