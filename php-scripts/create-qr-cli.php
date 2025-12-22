<?php

declare(strict_types=1);

header('Content-Type: application/json');

include_once __DIR__ . "/../vendor/autoload.php";

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\QRGdImagePNG;

if (!isset($_GET['url']) || trim($_GET['url']) === '') {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing url parameter'
    ]);
    exit;
}

$url = $_GET['url'];

$options = new QROptions;

$options->version             = 7;
$options->outputInterface     = QRGdImagePNG::class;
$options->scale               = 20;
$options->outputBase64        = false;
$options->bgColor             = [200, 150, 200];
$options->imageTransparent    = true;
$options->drawCircularModules = true;
$options->drawLightModules    = true;
$options->circleRadius        = 0.4;
$options->keepAsSquare        = [
    QRMatrix::M_FINDER_DARK,
    QRMatrix::M_FINDER_DOT,
    QRMatrix::M_ALIGNMENT_DARK,
];

$name = 'qr-' . time() . '.svg';
$relativePath = "generated-qrs/$name";
$absolutePath = __DIR__ . "/generated-qrs/$name";

try {
    (new QRCode($options))->render($url, $absolutePath);

    echo json_encode([
        'status' => 'ok',
        'file'   => $name,
        'url'    => "https://castelancarpinteyro.com/php-scripts/generated-qrs/$name"
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status'  => 'error',
        'message' => $e->getMessage()
    ]);
}
