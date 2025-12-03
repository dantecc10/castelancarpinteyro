<?php
include('php-scripts/dynamicMailSettings.php');   // Importa tu archivo con setMailParameters()

// El servidor recibe los datos mediante GET y los muestra en una tabla HTML.
// Ejemplo de uso desde el .ino:
// Enviando datos a: https://castelancarpinteyro.com/php-scripts/testESP32.php?ax=10.24&ay=0.09&az=-0.81&temp=24.33

// Parámetros esperados
$params = ['ax', 'ay', 'az', 'temp'];
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
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Datos ESP32</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px
        }

        table {
            border-collapse: collapse;
            width: 360px
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center
        }

        th {
            background: #f4f4f4
        }

        .meta {
            margin-bottom: 12px
        }

        .missing {
            color: #999;
            font-style: italic
        }
    </style>
</head>

<body>
    <h2>Datos recibidos del ESP32</h2>
    <div class="meta">Remitente: <strong><?php echo $remoteIp; ?></strong> — Fecha: <strong><?php echo $ts; ?></strong></div>

    <table>
        <thead>
            <tr>
                <th>Parámetro</th>
                <th>Valor</th>
            </tr>
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
        $mail->AltBody = 'Datos ESP32: ' . json_encode(array_map(function ($v) {
            return $v === null ? 'no enviado' : $v;
        }, $data));

        if ($mail->send()) {
            echo '<p><strong>Correo enviado correctamente.</strong></p>';
        } else {
            echo '<p><strong>Error al enviar:</strong> ' . htmlspecialchars($mail->ErrorInfo, ENT_QUOTES, 'UTF-8') . '</p>';
        }
    } catch (Exception $e) {
        echo '<p><strong>Excepción al enviar:</strong> ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
    }

    // Enviar también por WebSocket al servidor (para visualización en tiempo real)
    // Configurable vía env: WS_FORWARD_SCHEME (ws|wss), WS_FORWARD_HOST, WS_FORWARD_PORT, WS_FORWARD_PATH
    $wsScheme = getenv('WS_FORWARD_SCHEME') ?: 'ws';
    $wsHost = getenv('WS_FORWARD_HOST') ?: '127.0.0.1';
    $wsPort = getenv('WS_FORWARD_PORT') ?: ($wsScheme === 'wss' ? 443 : 8080);
    $wsPath = getenv('WS_FORWARD_PATH') ?: '/';
    $wsVerify = getenv('WS_FORWARD_VERIFY') !== '0'; // por defecto true; poner 0 para permitir self-signed

    /**
     * Envia un mensaje de texto simple a un servidor WebSocket (ws:// o wss://) y cierra.
     * Usa stream_socket_client con contexto SSL cuando se requiere TLS.
     * Devuelve true si el handshake y envío parecen correctos.
     */
    function send_simple_ws_message($host, $port, $path, $message, $useTls = false, $verifyPeer = true, &$err = null)
    {
        $errno = 0;
        $errstr = '';

        $remote = ($useTls ? 'ssl://' : '') . $host . ':' . $port;
        $contextOptions = [];
        if ($useTls) {
            $contextOptions['ssl'] = [
                'verify_peer' => $verifyPeer,
                'verify_peer_name' => $verifyPeer,
                'allow_self_signed' => !$verifyPeer,
                'SNI_enabled' => true,
                'peer_name' => $host,
            ];
        }
        $context = stream_context_create($contextOptions);

        $fp = @stream_socket_client($remote, $errno, $errstr, 3, STREAM_CLIENT_CONNECT, $context);
        if (!$fp) {
            $err = "stream_socket_client failed: $errstr ($errno)";
            return false;
        }

        $key = base64_encode(random_bytes(16));
        $out = "GET " . $path . " HTTP/1.1\r\n";
        $out .= "Host: " . $host . (is_numeric($port) ? ":" . $port : '') . "\r\n";
        $out .= "Upgrade: websocket\r\n";
        $out .= "Connection: Upgrade\r\n";
        $out .= "Sec-WebSocket-Key: $key\r\n";
        $out .= "Sec-WebSocket-Version: 13\r\n";
        $out .= "\r\n";

        fwrite($fp, $out);

        // Leer respuesta de handshake (headers)
        $response = '';
        while (!feof($fp)) {
            $line = fgets($fp);
            if ($line === false) break;
            $response .= $line;
            if (rtrim($line) === '') break; // fin headers
        }

        if (stripos($response, ' 101 ') === false) {
            $err = "Handshake failed: " . strtok($response, "\r\n");
            fclose($fp);
            return false;
        }

        // Construir frame (cliente debe enmascarar)
        $payload = (string)$message;
        $len = strlen($payload);
        $b1 = 0x81; // FIN + text frame
        if ($len <= 125) {
            $b2 = 0x80 | $len; // mask bit set
            $header = pack('C2', $b1, $b2);
        } elseif ($len <= 65535) {
            $b2 = 0x80 | 126;
            $header = pack('C2n', $b1, $b2, $len);
        } else {
            // No soportado en este helper
            $err = 'Payload demasiado grande';
            fclose($fp);
            return false;
        }

        $mask = random_bytes(4);
        $masked = '';
        for ($i = 0; $i < $len; $i++) {
            $masked .= $payload[$i] ^ $mask[$i % 4];
        }

        fwrite($fp, $header . $mask . $masked);

        // Opcional: leer respuesta breve del servidor (no obligatorio)
        stream_set_timeout($fp, 1);
        $maybe = @fread($fp, 8192);

        fclose($fp);
        return true;
    }

    $payload = ['ts' => $ts, 'ip' => $remoteIp];
    foreach ($params as $p) {
        $payload[$p] = $data[$p];
    }
    $json = json_encode($payload);

    $useTls = strtolower($wsScheme) === 'wss';
    $wsErr = null;
    if (send_simple_ws_message($wsHost, $wsPort, $wsPath, $json, $useTls, $wsVerify, $wsErr)) {
        echo '<p><strong>Enviado por WebSocket a ' . htmlspecialchars(($useTls ? 'wss' : 'ws') . '://' . $wsHost . ':' . $wsPort . $wsPath, ENT_QUOTES, 'UTF-8') . '.</strong></p>';
    } else {
        echo '<p><strong>Error enviando por WebSocket:</strong> ' . htmlspecialchars($wsErr ?? 'desconocido', ENT_QUOTES, 'UTF-8') . '</p>';
    }

    ?>
</body>

</html>