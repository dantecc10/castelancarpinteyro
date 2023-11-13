<?php
include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexiónPDO = new mysqli("localhost", "$data[0]", "$data[1]", "$data[2]");

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo ("Conexión establecida");
}
/*

session_start();
$otherUser = 5;
$user = mysqli_real_escape_string($conexiónPDO, $_SESSION['id']);
$chatUser = mysqli_real_escape_string($conexiónPDO, $otherUser);

#$username = mysqli_real_escape_string($conexiónPDO, $_POST['email']);
#$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']); //Recepción de variables que pasan por filtro anti exploits SQL

$sql = "SELECT * FROM `messages` WHERE (`receiver_msg` = $currentUser AND `sender_msg` = $chatUser) OR (`sender_msg` = $chatUser AND `receiver_msg` = $currentUser)";
$resultado = $conexiónPDO->query($sql);

// Verificar si se encontró un usuario válido
if ($resultado->num_rows > 0) {
    // Acceso concedido, redireccionar a la página de inicio del sitio web
    if ($datos = $resultado->fetch_object()) { //Asignación y configuración de variables de sesión en arreglo de PHP
        if(isset($_SESSION['chat'])){
            if ($_SESSION['chat'] != $datos) {
                // Hay mensajes nuevos
                $_SESSION['chat'] = $datos;
                echo "Añadimos mensajes."
            } else {
                // No hay nuevos mensajes
                header("Location: build-chat.php");
            }
        }else{
            $_SESSION['chat'] = $datos;
        }
    }
    $conexiónPDO->close();
    //$fecha=$_SESSION['nacimiento'];
    header("Location: ../index.php");
} else {
    // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
    echo "No tienes un chat con el usuario " . $chatUser;
    $conexiónPDO->close();
    header("Location: ../account.php");
}

// Cerrar la conexión a la base de datos
