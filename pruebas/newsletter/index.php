<?php
session_start();
function send()
{
    header("Location: envío.php");
}

// Conexión a la base de datos
$conn = new mysqli("localhost", "darkseid", "DarkseidPower23!!", "castelancarpinteyro");

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
        //echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
    } else {
        //echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
    }
    // Realizar otras acciones con el registro...
}

// Función "saludar"
function actualizar($id, $conn)
{
    // Actualizar el estado a "Enviado"
    $sql = "UPDATE test_mn SET status_mn = 'Enviado' WHERE id_mn = $id";
    if ($conn->query($sql) === TRUE) {
        //echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
    } else {
        //echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
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
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        $id = $row['id_mn'];
        $_SESSION['id'][$i] = $id;

        $emailDestino = $row['email_destino_mn'];
        $_SESSION['email'][$i] = $emailDestino;

        $fechaSQL = $row['fecha_mn'];
        $_SESSION['fecha'][$i] = $fechaSQL;
        $nombreDestino = $row['nombre_destino_mn'];
        $_SESSION['nombre'][$i] = $nombreDestino;
        $_SESSION['mensaje'][$i] = $row['contenido_mn'];

        // Actualizar el estado a "Enviado"
        $sql = "UPDATE `test_mn` SET status_mn = 'Enviado' WHERE id_mn = $id";
        if ($conn->query($sql) === TRUE) {
            //echo "Saludando al registro con ID: " . $id . " y actualizando estado a 'Enviado'<br>";
        } else {
            //echo "Error al actualizar el estado del registro con ID: " . $id . ": " . $conn->error;
        }
        $i++;
    }
    $_SESSION['límite'] = $i;
    send();
    //include_once "envío.php";
    //include "envío.php";
    //require_once "envío.php";
    //require "envío.php";
} else {
    echo "No se encontraron registros con la fecha actual.";
}

// Cerrar la conexión a la base de datos
$conn->close();
