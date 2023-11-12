<?php

namespace PHPMailer\PHPMailer;

session_start();

//include "../../php scripts/dynamicMailSettings.php"; // Importación de configuración dinámica


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../vendor/phpmailer/phpmailer/src/Exception.php');

include "dynamicSecrets.php";
include "secrets.php";

$data = generatePasskey('auth');

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

//$mail = setMailParameters('newsletter'); // Inicializar el objeto $mail con la función setMailParameters()
if (($_SESSION['key'] != null) && $_SESSION['email'] != null) {

    $mail->ClearAllRecipients();
    $mail->AddAddress($_SESSION['email']);
    $mail->AddCC("store-keys@castelancarpinteyro.com");
    #$mail->AddCC("dante@castelancarpinteyro.com");
    #$mail->AddCC("dantecc10@gmail.com");

    $mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
    $mail->Subject = 'Código de autenticación de dos factores.';

    $msg = ("<h1>Falta poco.</h1>
            <p>Para completar la verificación de seguridad en Castelán Carpinteyro, ingresa el siguiente código en la página a la que fuiste redirigido:</p>
            <p>" . $_SESSION['key'] . "</p>
            <p>Tienes un plazo de 24 horas para completar la autenticación de dos factores. Puedes hacerlo dando click en <a href='https://castelancarpinteyro.com/verify.php?email=" . urlencode($_SESSION['email']) . "'>este enlace.</a></p>
            <p>¡Gracias por tu registro!</p>
            <br><br><br>
            <p>Si no has intentado registrarte en Castelán Carpinteyro, por favor ignora este correo.</p>
            ");

    $mail->Body = $msg;

    try {
        $mail->Send();
        // Resto del código...
    } catch (Exception $e) {
        //echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
        //echo "Excepción lanzada: " . $e->getMessage();
    }
    header("Location: ../verify.php");
}

// Eliminar todos los elementos de $_SESSION['id']
//session_unset();
unset($_SESSION['key']);
/*
foreach ($_SESSION['nombre'] as $index => $value) {
    unset($_SESSION['nombre'][$index]);
}

$_SESSION['nombre'] = array();*/