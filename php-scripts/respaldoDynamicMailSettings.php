<?php

namespace PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../vendor/phpmailer/phpmailer/src/Exception.php');

$mail->SMTPDebug = 3;
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = "castelancarpinteyro.com";
$mail->SMTPSecure = 'TLS';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';

function setMailParameters($turing)
{
    include "dynamicSecrets.php";

    $data = generatePasskey($turing);

    $tempUsername = $data[2];
    $tempPassword = $data[0];
    $tempFrom = $data[2];
    $tempFromName = $data[1];

    return array($tempUsername, $tempPassword, $tempFrom, $tempFromName);
}

// Llamamos a la función setMailParameters y almacenamos los valores en variables
[$tempUsername, $tempPassword, $tempFrom, $tempFromName] = setMailParameters('newsletter');

$mail->Username = $tempUsername;
$mail->Password = $tempPassword;
$mail->From = $tempFrom;
$mail->FromName = $tempFromName;

// Resto de tu código...


//$mail = setMailParameters('dante');
//echo $mail;
?>