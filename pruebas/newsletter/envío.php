<?php

namespace PHPMailer\PHPMailer;
session_start();

//include "../../php scripts/dynamicMailSettings.php"; // Importación de configuración dinámica


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../vendor/phpmailer/phpmailer/src/Exception.php');

    include "../../php scripts/dynamicSecrets.php";
    include "../../php scripts/secrets.php.php";

    $data = generatePasskey('newsletter');

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
    

//$mail = setMailParameters('dante');
//echo $mail;


//$mail = setMailParameters('newsletter'); // Inicializar el objeto $mail con la función setMailParameters()

for ($i = 0; $i < $_SESSION['límite']; $i++) {
    if ($_SESSION['id'][$i] != null) {

        $mail->ClearAllRecipients();
        $mail->AddAddress($_SESSION['email'][$i]);
        $mail->AddCC("dante@castelancarpinteyro.com");
        $mail->AddCC("dantecc10@gmail.com");

        $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
        $mail->Subject = 'Correo de prueba del newsletter de Castelán Carpinteyro';

        $msg = "<h1>¡Hola " . $_SESSION['nombre'][$i] . "!</h1>
            <p>Según la base de datos, hoy " . $_SESSION['fecha'][$i] . " hay un mensaje para tí desde el newsletter.</p>
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
