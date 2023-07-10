<?php
function generateKey() // Operative ✅
{
    # $contadorDígitos = 0;
    $min = 100000;
    $max = 999999;
    # $dígitoAleatorioGenerado = rand(1, $max);
    $auth_key = rand($min, $max);

    $auth_key = 486753; // Debug 🐞
    return $auth_key;
}

// Crear la conexión
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

// Verificar la conexión
if ($conexiónPDO->connect_error) {
    die("Conexión fallida: " . $conexiónPDO->connect_error);
}

$sql = "SELECT * FROM `auth_keys` WHERE `auth_key` = generateKey()";
$result = $conexiónPDO->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    
    //header("Location: ../signin.php");
    //echo "La clave ya está existe."; // Debug 🐞
} else {}