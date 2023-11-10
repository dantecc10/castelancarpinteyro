<?php
session_destroy();
session_start();
include "dynamicSecrets.php";
$data = generatePasskey('sql');

$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo ("Conexión establecida");
}

$username = mysqli_real_escape_string($conexiónPDO, $_POST['email']);
$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']); //Recepción de variables que pasan por filtro anti explits SQL

$sql = "SELECT * FROM `usuarios` WHERE (`email_usuario` = '$username' OR `email_dominio` = '$username') AND (`password_usuario` = '$password') AND (`activo_usuario` = 1)";
$resultado = $conexiónPDO->query($sql);

// Verificar si se encontró un usuario válido
if ($resultado->num_rows > 0) {
    // Acceso concedido, redireccionar a la página de inicio del sitio web
    if ($datos = $resultado->fetch_object()) { //Asignación y configuración de variables de sesión en arreglo de PHP
        $_SESSION['Iniciada'] = true;
        $_SESSION['id'] = $datos->id_usuario;
        $_SESSION['nombre'] = $datos->nombre_usuario;
        $_SESSION['apellidoPaterno'] = $datos->apellidoPaterno_usuario;
        $_SESSION['apellidoMaterno'] = $datos->apellidoMaterno_usuario;
        $_SESSION['rol'] = $datos->rol_usuario;
        $_SESSION['usuario'] = $datos->nombreUsuario_usuario;
        $_SESSION['img'] = ("assets/img/avatar-icons/" . $datos->img_usuario);
        $_SESSION['nacimiento'] = $datos->nacimiento_usuario;
        $_SESSION['email'] = $datos->email_usuario;
        $_SESSION['emailDominio'] = $datos->email_dominio;
    }
    $conexiónPDO->close();
    //$fecha=$_SESSION['nacimiento'];
    header("Location: ../index.php");
} else {
    // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
    echo "Nombre de usuario o contraseña incorrectos";
    $conexiónPDO->close();
    header("Location: ../login.php");
}

// Cerrar la conexión a la base de datos
