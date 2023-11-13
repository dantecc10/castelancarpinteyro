<?php
session_start();

$otherUser = 5; // Constante para pruebas, luego dinámico para establecer el chateador
$currentUser = $_SESSION['id'];
$chatUser = $otherUser;

include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo "Conexión establecida";
}

$sql = "SELECT * FROM `messages` WHERE (`receiver_msg` = ? AND `sender_msg` = ?) OR (`sender_msg` = ? AND `receiver_msg` = ?)";

$stmt = $conexiónPDO->prepare($sql);
if ($stmt) {
    $stmt->bind_param("iiii", $currentUser, $chatUser, $currentUser, $chatUser);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            echo ("<br>" . var_dump($fila) . "<br>");
            $new_id_msg = ("" . $fila["id_msg"] . "");
            $new_receiver_msg = ("" . $fila["receiver_msg"] . "");
            $new_sender_msg = ("" . $fila["sender_msg"] . "");
            $new_content_msg = ("" . $fila["content_msg"] . "");
            $new_type_msg = ("" . $fila["type_msg"] . "");
            $new_time_msg = ("" . $fila["time_msg"] . "");

            $datos['chat'][$i] = [$new_id_msg, $new_receiver_msg, $new_sender_msg, $new_content_msg, $new_type_msg, $new_time_msg];
            $i++;
        }
        $_SESSION['chat'] = $datos;
        $_SESSION['límite'] = $i;
        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conexiónPDO->close();
    } else {
        // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
        echo "No tienes un chat con el usuario " . $chatUser;
        echo ($sql);
        //header("Location: ../account.php");
    }
}
