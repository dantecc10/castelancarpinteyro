<?php
session_start();

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
        echo ('Se ha añadido el mensaje a la base de datos.');
        //unset($datos);
        exit();
    } else {
        echo "Error al almacenar o procesar el mensaje."; // Debug 🐞
    }

    // Cerrar la conexión
    $conexiónPDO->close();
}

/*if (isset($datos['msg'])) {

    //$sender = $_SESSION['id'];
    $datos['msg']['receiver'] = $_POST['receiver'];
    $datos['msg']['content'] = str_replace('\n', '
', $_POST['content']);
    $datos['msg']['type'] = $_POST['type'];

    $sender = $_SESSION['id'];
    $receiver = $datos['msg']['receiver'];
    $content = $datos['msg']['content'];
    if (isset($datos['msg']['type'])) {
        $type = $datos['msg']['type'];
    } else {
        //Tipo de dato por defecto
        $type = "text";
    }
    addMsg($_SESSION['id'], $_POST['receiver'], str_replace('\n', '
    ', $_POST['content']), $_POST['type']);
} else {
    echo ("Parámetros inválidos.");
}*/

addMsg($_SESSION['id'], $_POST['receiver'], str_replace('\n', '
', $_POST['content']), $_POST['type']);