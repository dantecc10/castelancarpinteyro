<?php
require_once('php-scripts/dynamicMailSettings.php');   // Importa tu archivo con setMailParameters()

try {
    // Obtiene un PHPMailer ya configurado según tu función
    $mail = setMailParameters('tester');

    // Destinatario(s)
    $mail->addAddress('dante@castelancarpinteyro.com', 'Dante Castelán Carpinteyro');

    // Contenido del mensaje
    $mail->isHTML(true);
    $mail->Subject = 'Asunto de prueba';
    $mail->Body    = '<h3>Mensaje enviado correctamente</h3><p>Este es un ejemplo usando tu función setMailParameters().</p>';
    $mail->AltBody = 'Mensaje enviado correctamente (texto plano).';

    // Envío
    if ($mail->send()) {
        echo 'Correo enviado correctamente';
    } else {
        echo 'Error al enviar: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Excepción al enviar: ' . $e->getMessage();
}
