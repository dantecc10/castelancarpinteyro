<?php
include "conexión.php";
session_start();
#if (!empty($_POST['email']) and !empty($_POST['password'])) {
$email = $_POST['email'];
$password = $_POST['password'];
$conexión = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");
$consulta = $conexión->query("SELECT * FROM `usuarios` WHERE (`email_usuario`='$email' OR `email_dominio`='$email') AND `password_usuario`='$password' AND `activo_usuario`=1;");
if ($datos = $sql->fetch_object()) {
    $_SESSION['id_usuario'] = $datos->id_usuario;
    $_SESSION['nombre_usuario'] = $datos->nombre_usuario;
    $_SESSION['apellidoPaterno_usuario'] = $datos->apellidoPaterno_usuario;
    $_SESSION['apellidoMaterno_usuario'] = $datos->apellidoMaterno_usuario;
    $_SESSION['rol_usuario'] = $datos->rol_usuario;
    $_SESSION['email_usuario'] = $datos->email_usuario;
    $_SESSION['email_dominio'] = $datos->email_dominio;
    $_SESSION['activo_usuario'] = $datos->activo_usuario;
    header("Location: index.php");
} else {
    echo "Acceso denegado";
}
#}