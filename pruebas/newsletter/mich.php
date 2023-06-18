<?php

// Configuración de la conexión a la base de datos
//$servername = "localhost";
//$username = "nombre_de_usuario";
//$password = "contraseña";
//$dbname = "nombre_de_la_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli("localhost", "darkseid", "DarkseidPower22!!", "castelancarpinteyro");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Función "saludar"
function saludar($id, $conn)
{
    // Actualizar el estado a "Enviado"
    $sql = "UPDATE test_mn SET status_mn = 'Enviado' WHERE id_mn = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
    } else {
        echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
    }
    // Realizar otras acciones con el registro...
}

// Función "saludar"
function actualizar($id, $conn)
{
    // Actualizar el estado a "Enviado"
    $sql = "UPDATE test_mn SET status_mn = 'Enviado' WHERE id_mn = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
    } else {
        echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
    }
    // Realizar otras acciones con el registro...
}

// Obtener la fecha actual en formato 'YYYY-MM-DD'
$fecha_actual = date('Y-m-d');

// Consulta SQL para seleccionar los registros con fecha igual a la fecha actual
$sql = "SELECT * FROM `test_mn` WHERE (`fecha_mn` = '$fecha_actual') AND (`status_mn` = 'Pendiente')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorrer los resultados y ejecutar la función "saludar($i)"
    while ($row = $result->fetch_assoc()) {
        $id = $row['id_mn'];
        //saludar($id);

        //include "../../php%20scripts/respaldoDynamicMailSettings.php";
        //---------
        //require_once('phpmailer/PHPMailerAutoload.php');
//la version con vulnerabilidades es la linea justo debajo
//require_once('PHPMailerAutoload.php');
//nueva version 6.1.1
namespace PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('../../vendor/phpmailer/src/PHPMailer.php');
require_once('../../vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('../../vendor/phpmailer/phpmailer/src/Exception.php');

//$mail->SMTPDebug    = 3;
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = "castelancarpinteyro.com"; #'classicandsacrum.com';   /*Servidor SMTP no pongas la ip, pon el nombre de la dns inversa*/																		
$mail->SMTPSecure = 'TLS';   /*Protocolo SSL o TLS*/
$mail->Port = 587;   /*Puerto de conexión al servidor SMTP*/
$mail->SMTPAuth = true;   /*Para habilitar o deshabilitar la autenticación*/
$mail->CharSet = 'UTF-8';   /*Codificación del mensaje*/


include "../../php scripts/dynamicSecrets.php";
$turing = "newsletter";
$data = generatePasskey($turing);

$mail->Username = $data[2]; #'academia@classicandsacrum.com';   /*Usuario, normalmente el correo electrónico*/
$mail->Password = $data[0];   /*Tu contraseña*/
$mail->From = $data[2]; #'academia@classicandsacrum.com';   /*Correo electrónico que estamos autenticando*/
$mail->FromName = $data[1];   /*Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.*/
    //echo ($data[0] . " " . $data[1] . " " . $data[2]); // Debug command line

//setMailParameters('dante', $mail);
//echo $mail;
        //---------
        
        //setMailParameters('newsletter', $mail);
        //use function PHPMailer\PHPMailer\setMailParameters;

        $mail->ClearAllRecipients();

        $mail->AddAddress($row['email_destino_mn']);
        $mail->AddCC("dante@castelancarpinteyro.com");
        $mail->AddCC("dantecc10@gmail.com");

        $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
        $mail->Subject = 'Correo de prueba del newsletter de Castelán Carpinteyro';

        $msg = "<h1>¡Hola" . $row['nombre_destino_mn'] . "</h1>
            <p>Según la base de datos, hoy " . $row['fecha_mn'] . " hay un mensaje para tí desde el newsletter</p>
            <p>De parte de <b><i>Dante Castelán Carpinteyro</i></b>, recibe el siguiente mensaje: '" . $row['contenido_mn'] . "'.</p>
            <p>¡Gracias por ser parte de mis pruebas en el servidor! Me ayudas mucho. Por favor, siéntete libre de responder a este correo o por el medio que desees más mensajes personalizados para que los programe.</p>
        ";

        $mail->Body = $msg;
        try {
            // ...
            // Código para enviar el correo electrónico
            // ...

            $mail->Send();
            // Resto del código...
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
            echo "Excepción lanzada: " . $e->getMessage();
        }
        //actualizar($id, $conn);*/
        // Actualizar el estado a "Enviado"
        $sql = "UPDATE `test_mn` SET status_mn = 'Enviado' WHERE id_mn = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
        } else {
            echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
        }
    }
} else {
    echo "No se encontraron registros con la fecha actual.";
}

// Cerrar la conexión a la base de datos
$conn->close();
