<?php

//require_once('phpmailer/PHPMailerAutoload.php');
//la version con vulnerabilidades es la linea justo debajo
//require_once('PHPMailerAutoload.php');
//nueva version 6.1.1
namespace PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../vendor/phpmailer/phpmailer/src/Exception.php');


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

setMailParameters('dante');
echo $mail;