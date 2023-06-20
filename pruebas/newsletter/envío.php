<?php

use function PHPMailer\PHPMailer\setMailParameters;

session_start();

include "../../php scripts/dynamicMailSettings.php"; //Importación de configuración dimámica

/*
$id = $row['id_mn'];
        $_SESSION['id'][$i] = $id;

        $emailDestino = $row['email_destino_mn'];
        $_SESSION['email'][$i] = $emailDestino;

        $fechaSQL = $row['fecha_mn'];
        $_SESSION['fecha'][$i] = $fechaSQL;
        $nombreDestino = $row['nombre_destino_mn'];
        $_SESSION['nombre'][$i] = $nombreDestino;
        $_SESSION['mensaje'][$i] = $row['contenido_mn'];
*/
setMailParameters('newsletter');

for ($i = 0; $i < $_SESSION['límite']; $i++) {
    if ($_SESSION['id'][$i] != null) {

        $mail->ClearAllRecipients();

        $mail->AddAddress($_SESSION['email'][$i]);
        $mail->AddCC("dante@castelancarpinteyro.com");
        $mail->AddCC("dantecc10@gmail.com");

        $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
        $mail->Subject = 'Correo de prueba del newsletter de Castelán Carpinteyro';

        $msg = "<h1>¡Hola" . $_SESSION['nombre'][$i] . "</h1>
            <p>Según la base de datos, hoy " . $_SESSION['fecha'][$i] . " hay un mensaje para tí desde el newsletter</p>
            <p>De parte de <b><i>Dante Castelán Carpinteyro</i></b>, recibe el siguiente mensaje: '" . $_SESSION['mensaje'][$i] . "'.</p>
            <p>¡Gracias por ser parte de mis pruebas en el servidor! Me ayudas mucho. Por favor, siéntete libre de responder a este correo o por el medio que desees más mensajes personalizados para que los programe.</p>
        ";

        $mail->Body = $msg;
        $mail->Send();

        //try {
        //    // ...
        //    // Código para enviar el correo electrónico
        //    // ...
        //
        //    // Resto del código...
        //} catch (Exception $e) {
        //    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
        //    echo "Excepción lanzada: " . $e->getMessage();
        //}
    }
}
