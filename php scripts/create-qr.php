<?php

use chillerlan\QRCode\QRCode;

if (isset($_GET['url'])) {
    include_once "../vendor/autoload.php";
    
    // Define el nombre del archivo del código QR
    $name = "qr-" . time() . ".png";
    
    // Define la ruta del archivo del código QR
    $path = __DIR__ . "/generated-qrs/" . $name;

    // Crea una instancia de QRCode
    $qrcode = new QRCode;

    // Genera el código QR y guarda la imagen en la ruta de salida
    $qrcode->render($_GET['url'], $path);
    
    // Redirige a la página que muestra el código QR generado
    header("Location: ../generated-qr.php?file=$name");
    exit;
} else {
    // Redirige de vuelta a la página anterior si no se proporcionó una URL
    header("Location: ../qr-code.php");
    exit;
}
