<?php
session_start();
$datos['msg']['sender'] = "1";
$datos['msg']['receiver'] = "5";
$datos['msg']['content'] = "Este mensaje fue agregado por un script de prueba.";
$datos['msg']['type'] = "text";
function addMsg($sender, $receiver, $content, $type)
{
    include "dynamicSecrets.php";
    $data = generatePasskey('sql');
    $conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);
    // Verificar la conexión
    if ($conexiónPDO->connect_error) {
        die("Conexión fallida: " . $conexiónPDO->connect_error);
    }

    $sql = "INSERT INTO `messages` VALUES ('', ?, ?, ?, ?, CURRENT_TIMESTAMP())";
    $stmt = $conexiónPDO->prepare($sql);
    // Limpiar y vincular los parámetros
    $stmt->bind_param("ssss", $sender, $receiver, $content, $type);
    $sender = $conexiónPDO->real_escape_string($sender); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
    $receiver = $conexiónPDO->real_escape_string($receiver); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
    $content = $conexiónPDO->real_escape_string($content); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
    $type = $conexiónPDO->real_escape_string($type); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
    // Ejecutar la sentencia preparada
    $stmt->execute();

    // Verificar el éxito de la inserción
    if ($stmt->affected_rows > 0) {
        echo ('Se ha añadido el mensaje a la base de datos');
    } else {
        echo "Error al almacenar o procesar el mensaje."; // Debug 🐞
    }

    // Cerrar la conexión
    $conexiónPDO->close();
}

if (isset(/*$_GET*/$datos['msg'])) {
    /*$_GET*/
    $sender = $datos['msg']['sender'];
    /*$_GET*/
    $receiver = $datos['msg']['receiver'];
    /*$_GET*/
    $content = $datos['msg']['content'];
    if (isset(/*$_GET*/$datos['msg']['type'])) {
        $type = /*$_GET*/ $datos['msg']['type'];
    } else {
        $type = "text";
    }
    addMsg($sender, $receiver, $content, $type);
} else {
    echo ("Parámetros inválidos.");
}
