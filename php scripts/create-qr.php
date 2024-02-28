<?php

use chillerlan\QRCode\QRCode;

if (isset($_GET['url'])) {
    include_once "../vendor/autoload.php";
    $qrcode = new QRCode;
    $qr_img = $qrcode->render($_GET['url']);
    $name = ("qr-" . time() . ".png");
    $path = ($name);
    file_put_contents(("generated-qrs/" . $path), $qr_img);
    header("Location: ../generated-qr.php?file=$name");
} else {
    header("Location: ../qr-code.php");
}
