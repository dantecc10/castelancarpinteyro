<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
echo "Dirección IP: " . $ip;

//$ip = '192.168.0.1'; // Dirección IP de ejemplo

// Realiza una solicitud a la API de ipstack
$response = file_get_contents("http://api.ipstack.com/{$ip}?access_key=d2bf5cc5db54f4fd6c9ed7355cc4bb6e");

// Decodifica la respuesta JSON
$data = json_decode($response, true);

// Extrae la información geográfica
$country = $data['country_name'];
$city = $data['city'];

// Imprime la información
echo "País: " . $country . "<br>";
echo "Ciudad: " . $city;

$conn = new mysqli("localhost", "darkseid", "DarkseidPower22!!", "castelancarpinteyro");
// Actualizar el estado a "Enviado"
$sql = "INSERT INTO `ip_testing` (`id`, `ip`, `country`, `city`, `time`) VALUES ('', '$ip', '$country', '$city', CURRENT_TIMESTAMP)";
if ($conn->query($sql) === TRUE) {
    echo "Inserción correcta en la base de datos<br>";
} else {
    echo "Error en la base de datos. " . $conn->error;
}
$_SESSION['ip'] = $ip;
$_SESSION['country'] = $country;
$_SESSION['city'] = $city;
$timestamp = date('Y-m-d H:i:s');
$_SESSION['timestamp'] = $timestamp;

header("Location: send.php");
