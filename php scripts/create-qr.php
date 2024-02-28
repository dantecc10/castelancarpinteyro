<?php

use chillerlan\QRCode\QRCode;

if (isset($_GET['url'])) {
    include "functions.php";
    include_once "../vendor/autoload.php";
    $qrcode = new QRcode;

    $qr_img = $qrcode->render($_GET['url']);
    $name = ("generated-qrs/qr-" . time() . "-.png");
    $path = ("../" . $path);
    file_put_contents($path, $qr_img);
    header("Location: ../generated-qr.php?file=$name");
} else {
    header("Location: ../qr-code.php");
}
