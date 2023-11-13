<?php
session_start();

include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo "Conexión establecida";
}

$otherUser = 5; // Constante para pruebas, luego dinámico para establecer el chateador
$currentUser = $_SESSION['id'];
$chatUser = $otherUser;

$sql = "SELECT * FROM `messages` WHERE (`receiver_msg` = ? AND `sender_msg` = ?) OR (`sender_msg` = ? AND `receiver_msg` = ?)";

$stmt = $conexiónPDO->prepare($sql);
if ($stmt) {
    $stmt->bind_param("iiii", $currentUser, $chatUser, $currentUser, $chatUser);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $i = 0;
        while ($row = $resultado->fetch_assoc()) {
            if (is_object($row)) {
                $_SESSION['chat']['id_msg'][$i] = $row->id_msg;
                $_SESSION['chat']['sender_msg'][$i] = $row->sender_msg;
                $_SESSION['chat']['receiver_msg'][$i] = $row->receiver_msg;
                $_SESSION['chat']['content_msg'][$i] = $row->content_msg;
            } else {
                $_SESSION['chat']['id_msg'][$i] = $row['id_msg'];
                $_SESSION['chat']['sender_msg'][$i] = $row['sender_msg'];
                $_SESSION['chat']['receiver_msg'][$i] = $row['receiver_msg'];
                $_SESSION['chat']['content_msg'][$i] = $row['content_msg'];
            }
            $i++;
        }
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
