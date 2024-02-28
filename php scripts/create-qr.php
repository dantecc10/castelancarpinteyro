<?php

use chillerlan\QRCode\QRCode;
echo(__DIR__);
if (isset($_GET['url'])) {
    include "functions.php";
    include_once "../vendor/autoload.php";
    $qrcode = new QRcode;
    $qr_img = $qrcode->render($_GET['url']);
    $name = ("qr-" . time() . ".png");
    $path = ($name);
    file_put_contents((__DIR__ . $path), $qr_img);
    header("Location: ../generated-qr.php?file=$name");
} else {
    header("Location: ../qr-code.php");
}
