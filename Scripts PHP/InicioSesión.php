<?php
session_start();
if (!empty($_POST['InicioSesión'])) {
    //if (!empty($_POST['Usuario']) and !empty($_POST['Contraseña'])) {
    $usuario = $_POST['Usuario'];
    $contraseña = $_POST['Contraseña'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $sql = $conexión->query("SELECT * FROM `usuarios_prog5a` WHERE `Usuario`='$usuario' AND `Contraseña`='$contraseña'");
    if ($datos = $sql->fetch_object()) {
        $_SESSION['ID'] = $datos->ID;
        $_SESSION['Nombre'] = $datos->Nombre;
        $_SESSION['Apellidos'] = $datos->Apellidos;
        $_SESSION['Usuario'] = $datos->Usuario;
        $NombreCompleto = ($_SESSION['Nombre'] . " " . $_SESSION['Apellidos']);

        $sql = $conexión->query("INSERT INTO `localizaciones` VALUES ('', '$NombreCompleto', '$usuario', '$latitude', '$longitude')");

        header("location: Acceso.php");
    } else {
        echo "<div>Acceso denegado<div>";
    }
    //} else {
    echo "Campos vacíos";
    //}
}
