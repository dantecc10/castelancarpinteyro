<?php
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo ("Conexión establecida");
}

$username = mysqli_real_escape_string($conexiónPDO, $_POST['username']);
$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']);

$sql = "SELECT * FROM usuarios WHERE (`email_usuario` = '$username' OR `email_dominio` = '$username') AND `password_usuario` = '$password'";
$resultado = $conexiónPDO->query($sql);

// Verificar si se encontró un usuario válido
if ($resultado->num_rows > 0) {
    // Acceso concedido, redireccionar a la página de inicio del sitio web
    header("location: index.php");
} else {
    // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
    echo "Nombre de usuario o contraseña incorrectos";
    header("location: login.php");
}

// Cerrar la conexión a la base de datos
$conexiónPDO->close();