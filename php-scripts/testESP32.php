<?php
include ('dynamicMailSettings.php');   // Importa tu archivo con setMailParameters()

function setMailParameters($turing)
{
    include "dynamicSecrets.php";

    $data = generatePasskey($turing);

    //$mail->SMTPDebug    = 3;
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = "castelancarpinteyro.com"; #'classicandsacrum.com';   /*Servidor SMTP no pongas la ip, pon el nombre de la dns inversa*/																		
    $mail->SMTPSecure = 'TLS';   /*Protocolo SSL o TLS*/
    $mail->Port = 587;   /*Puerto de conexión al servidor SMTP*/
    $mail->SMTPAuth = true;   /*Para habilitar o deshabilitar la autenticación*/
    $mail->Username = $data[2]; #'academia@classicandsacrum.com';   /*Usuario, normalmente el correo electrónico*/
    $mail->Password = $data[0];   /*Tu contraseña*/
    $mail->From = $data[2]; #'academia@classicandsacrum.com';   /*Correo electrónico que estamos autenticando*/
    $mail->FromName = $data[1];   /*Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.*/
    $mail->CharSet = 'UTF-8';   /*Codificación del mensaje*/
    //echo ($data[0] . " " . $data[1] . " " . $data[2]); // Debug command line
    return $mail;
}

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
