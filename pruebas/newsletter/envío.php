<?php

use function PHPMailer\PHPMailer\setMailParameters;

session_start();

include "../../php scripts/dynamicMailSettings.php"; // Importación de configuración dinámica

$mail = setMailParameters('newsletter'); // Inicializar el objeto $mail con la función setMailParameters()

for ($i = 0; $i < $_SESSION['límite']; $i++) {
    if ($_SESSION['id'][$i] != null) {

        $mail->ClearAllRecipients();
        $mail->AddAddress($_SESSION['email'][$i]);
        $mail->AddCC("dante@castelancarpinteyro.com");
        $mail->AddCC("dantecc10@gmail.com");

        $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
        $mail->Subject = 'Correo de prueba del newsletter de Castelán Carpinteyro';

        $msg = "<h1>¡Hola" . $_SESSION['nombre'][$i] . "</h1>
            <p>Según la base de datos, hoy " . $_SESSION['fecha'][$i] . " hay un mensaje para tí desde el newsletter</p>
            <p>De parte de <b><i>Dante Castelán Carpinteyro</i></b>, recibe el siguiente mensaje: '" . $_SESSION['mensaje'][$i] . "'.</p>
            <p>¡Gracias por ser parte de mis pruebas en el servidor! Me ayudas mucho. Por favor, siéntete libre de responder a este correo o por el medio que desees más mensajes personalizados para que los programe.</p>";

        $mail->Body = $msg;

        try {
            $mail->Send();
            // Resto del código...
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
            echo "Excepción lanzada: " . $e->getMessage();
        }
    }
}
