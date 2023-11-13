<?php
session_start();

include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);


if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo ("Conexión establecida");
}

$otherUser = 5; // Constante para pruebas, luego dinámico para establecer el chateador
$currentUser = mysqli_real_escape_string($conexiónPDO, $_SESSION['id']);
$chatUser = mysqli_real_escape_string($conexiónPDO, $otherUser);

#$username = mysqli_real_escape_string($conexiónPDO, $_POST['email']);
#$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']); //Recepción de variables que pasan por filtro anti exploits SQL

$sql = "SELECT * FROM `messages` WHERE (`receiver_msg` = $currentUser AND `sender_msg` = $chatUser) OR (`sender_msg` = $currentUser AND `receiver_msg` = $chatUser)";
$resultado = $conexiónPDO->query($sql);

// Verificar si se encontró un usuario válido
if ($resultado->num_rows > 0) {

    $i = 0;
    while ($row = $resultado->fetch_assoc()) {
        //$_SESSION['mensaje'][$i] = $row['contenido_mn'];
        $_SESSION['chat']['id_msg'][$i] = $row['id_msg'];
        $_SESSION['chat']['sender_msg'][$i] = $row['sender_msg'];
        $_SESSION['chat']['receiver_msg'][$i] = $row['receiver_msg'];
        $_SESSION['chat']['content_msg'][$i] = $row['content_msg'];
        $i++;
    }
    $_SESSION['límite'] = $i;
    $conexiónPDO->close();
} else {
    // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
    echo "No tienes un chat con el usuario " . $chatUser;
    $conexiónPDO->close();
    echo ($sql);
    //header("Location: ../account.php");
}

// Cerrar la conexión a la base de datos
