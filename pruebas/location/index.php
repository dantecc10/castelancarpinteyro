<?php

$ip = $_SERVER['REMOTE_ADDR'];
echo "Dirección IP: " . $ip;

//$ip = '192.168.0.1'; // Dirección IP de ejemplo

// Realiza una solicitud a la API de ipstack
$response = file_get_contents("http://api.ipstack.com/{$ip}?access_key=TU_ACCESS_KEY");

// Decodifica la respuesta JSON
$data = json_decode($response, true);

// Extrae la información geográfica
$country = $data['country_name'];
$city = $data['city'];

// Imprime la información
echo "País: " . $country . "<br>";
echo "Ciudad: " . $city;
