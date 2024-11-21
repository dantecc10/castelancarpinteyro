<?php
session_start();
include_once "../vendor/autoload.php";

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRGdImagePNG;

if (isset($_GET['url'])) {
    if (isset($_GET['cecyte'])) {
        $proto_text = ("Hola, " . $_GET['name'] . ". Me comunico del área de Control Escolar de CECyTE Plantel Chignahuapan, con el objetivo de solicitarte de la manera más atenta responder la encuesta de satisfacción para egresados del " . $_GET['group'] . ". Para realizarla, es necesario ingresar con la matrícula y con tu CURP.
        Tu matrícula es: " . $_GET['matricula'] . ". Puedes responder la encuesta aquí: " . $_GET['url'] . ".");
        $_SESSION['cecyte_link'] = ("https://wa.me/52" . $_GET['mobile'] . "?text=" . urlencode($_GET['proto_text']));
        $_SESSION['cecyte_text'] = $proto_text;
    }
    // Inicializar las opciones del código QR
    $options = new QROptions;

    $options->version             = 7;
    $options->outputInterface     = QRGdImagePNG::class;
    $options->scale               = 20;
    $options->outputBase64        = false;
    $options->bgColor             = [200, 150, 200];
    $options->imageTransparent    = true;
    #$options->transparencyColor   = [233, 233, 233];
    $options->drawCircularModules = true;
    $options->drawLightModules    = true;
    $options->circleRadius        = 0.4;
    $options->keepAsSquare        = [
        QRMatrix::M_FINDER_DARK,
        QRMatrix::M_FINDER_DOT,
        QRMatrix::M_ALIGNMENT_DARK,
    ];
    $options->moduleValues        = [
        // finder
        QRMatrix::M_FINDER_DARK    => [0, 63, 255], // dark (true)
        QRMatrix::M_FINDER_DOT     => [0, 63, 255], // finder dot, dark (true)
        QRMatrix::M_FINDER         => [233, 233, 233], // light (false), white is the transparency color and is enabled by default
        // alignment
        QRMatrix::M_ALIGNMENT_DARK => [255, 0, 255],
        QRMatrix::M_ALIGNMENT      => [233, 233, 233],
        // timing
        QRMatrix::M_TIMING_DARK    => [255, 0, 0],
        QRMatrix::M_TIMING         => [233, 233, 233],
        // format
        QRMatrix::M_FORMAT_DARK    => [67, 159, 84],
        QRMatrix::M_FORMAT         => [233, 233, 233],
        // version
        QRMatrix::M_VERSION_DARK   => [62, 174, 190],
        QRMatrix::M_VERSION        => [233, 233, 233],
        // data
        QRMatrix::M_DATA_DARK      => [0, 0, 0],
        QRMatrix::M_DATA           => [233, 233, 233],
        // darkmodule
        QRMatrix::M_DARKMODULE     => [0, 0, 0],
        // separator
        QRMatrix::M_SEPARATOR      => [233, 233, 233],
        // quietzone
        QRMatrix::M_QUIETZONE      => [233, 233, 233],
        // logo (requires a call to QRMatrix::setLogoSpace()), see QRImageWithLogo
        QRMatrix::M_LOGO           => [233, 233, 233],
    ];

    // Define el nombre del archivo del código QR
    $name = "qr-" . time() . ".svg";

    // Define la ruta del archivo del código QR
    $path = (__DIR__ . "/generated-qrs/" . $name);
    // Crea una instancia de QRCode
    $out = (isset($_SESSION['cecyte_link'])) ? (new QRCode($options))->render($_SESSION['cecyte_link'], ("generated-qrs/" . $name)) : (new QRCode($options))->render($_GET['url'], ("generated-qrs/" . $name));
    //$out = (new QRCode($options))->render($_GET['url'], ("generated-qrs/" . $name));
    // Generar el código QR

    // Redirige a la página que muestra el código QR generado
    if (isset($_SESSION['cecyte_link'])) {
        header("Location: ../generated-qr.php?file=$name&cecyte=true");
    }
    header("Location: ../generated-qr.php?file=$name");
    //echo (var_dump($path));
    //echo (var_dump($name));
    //echo ("<img src='generated-qrs/$name'>");
} else {
    // Redirige de vuelta a la página anterior si no se proporcionó una URL
    header("Location: ../qr-code.php");
}
