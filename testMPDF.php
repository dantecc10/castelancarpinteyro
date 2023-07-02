<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir la clase mPDF
require_once __DIR__ . '/vendor/autoload.php'; // Asegúrate de ajustar la ruta al archivo de autoload

// Crear una instancia de mPDF
$mpdf = new \Mpdf\Mpdf();

// Generar el contenido HTML del documento
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Reconocimiento</title>
    <style>
        /* Estilos CSS para el documento */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reconocimiento</h1>
    </div>
    <div class="content">
        <p>¡Felicitaciones! Este es un reconocimiento generado automáticamente.</p>
        <p>Aquí puedes agregar el contenido del reconocimiento.</p>
    </div>
    <div class="footer">
        <p>Fecha: ' . date('Y-m-d') . '</p>
    </div>
</body>
</html>';

// Agregar el contenido HTML al documento
$mpdf->WriteHTML($html);

// Generar el documento PDF
$mpdf->Output('reconocimiento.pdf', 'D');
