<?php
// Configurar la conexión a la base de datos
#$servername = "nombre_del_servidor";
#$username = "nombre_de_usuario";
#$password = "contraseña";
#$dbname = "nombre_de_la_base_de_datos";
#$conexiónPDO = new mysqli($servername, $username, $password, $dbname);

include "Conexión.php";

// Verificar si la conexión es exitosa
if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
}

// Procesar el input de usuario y contraseña
$username = mysqli_real_escape_string($conexiónPDO, $_POST['username']);
$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']);

// Buscar el usuario y contraseña en la tabla de usuarios
$sql = "SELECT * FROM usuarios WHERE nombre_de_usuario = '$username' AND contraseña = '$password'";
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