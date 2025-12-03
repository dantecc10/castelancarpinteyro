<?php
include ('php-scripts/dynamicMailSettings.php');   // Importa tu archivo con setMailParameters()

// El servidor recibe los datos mediante GET y los muestra en una tabla HTML.
// Ejemplo de uso desde el .ino:
// Enviando datos a: https://castelancarpinteyro.com/php-scripts/testESP32.php?ax=10.24&ay=0.09&az=-0.81&temp=24.33

// Parámetros esperados
$params = ['ax','ay','az','temp'];
$data = [];
foreach ($params as $p) {
    if (isset($_GET[$p]) && $_GET[$p] !== '') {
        // sanitizar para salida HTML
        $data[$p] = htmlspecialchars($_GET[$p], ENT_QUOTES, 'UTF-8');
    } else {
        $data[$p] = null;
    }
}

$remoteIp = $_SERVER['REMOTE_ADDR'] ?? 'desconocida';
$ts = date('Y-m-d H:i:s');

// Generar HTML de la tabla
?><!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos ESP32</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;margin:20px}
        table{border-collapse:collapse;width:360px}
        th,td{border:1px solid #ccc;padding:8px;text-align:center}
        th{background:#f4f4f4}
        .meta{margin-bottom:12px}
        .missing{color:#999;font-style:italic}
    </style>
</head>
<body>
    <h2>Datos recibidos del ESP32</h2>
    <div class="meta">Remitente: <strong><?php echo $remoteIp; ?></strong> — Fecha: <strong><?php echo $ts; ?></strong></div>

    <table>
        <thead>
            <tr><th>Parámetro</th><th>Valor</th></tr>
        </thead>
        <tbody>
            <?php foreach ($params as $p): ?>
            <tr>
                <td><?php echo $p; ?></td>
                <td><?php echo ($data[$p] !== null) ? $data[$p] : '<span class="missing">no enviado</span>'; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>Query string: <code><?php echo htmlspecialchars($_SERVER['QUERY_STRING'] ?? '', ENT_QUOTES, 'UTF-8'); ?></code></p>

<?php
// Opcional: enviar correo con los datos recibidos (mantener funcionalidad existente)
try {
    $mail = setMailParameters('tester');
    $mail->addAddress('dante@castelancarpinteyro.com', 'Dante Castelán Carpinteyro');
    $mail->isHTML(true);
    $mail->Subject = 'Datos ESP32 recibidos — ' . $ts;

    // Construir cuerpo HTML del correo con la misma tabla
    $body = '<h3>Datos ESP32 recibidos</h3>';
    $body .= '<p>Remitente: ' . $remoteIp . ' — Fecha: ' . $ts . '</p>';
    $body .= '<table border="1" cellpadding="6" cellspacing="0">';
    $body .= '<tr><th>Parámetro</th><th>Valor</th></tr>';
    foreach ($params as $p) {
        $v = ($data[$p] !== null) ? $data[$p] : 'no enviado';
        $body .= '<tr><td>' . $p . '</td><td>' . $v . '</td></tr>';
    }
    $body .= '</table>';

    $mail->Body = $body;
    $mail->AltBody = 'Datos ESP32: ' . json_encode(array_map(function($v){ return $v===null? 'no enviado': $v; }, $data));

    if ($mail->send()) {
        echo '<p><strong>Correo enviado correctamente.</strong></p>';
    } else {
        echo '<p><strong>Error al enviar:</strong> ' . htmlspecialchars($mail->ErrorInfo, ENT_QUOTES, 'UTF-8') . '</p>';
    }
} catch (Exception $e) {
    echo '<p><strong>Excepción al enviar:</strong> ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
?>
</body>
</html>

