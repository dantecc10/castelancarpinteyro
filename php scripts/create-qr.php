<?php

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

if (isset($_GET['url'])) {
    include_once "../vendor/autoload.php";
    $qrcode = new QRCode;
    $name = ("qr-" . time() . ".png");
    $path = ($name);
    $qr_img = $qrcode->render($_GET['url'], (__DIR__ . "generated-qrs/" . $path));
    //file_put_contents(("generated-qrs/" . $path), $qr_img);
    header("Location: ../generated-qr.php?file=$name");
} else {
    header("Location: ../qr-code.php");
}
