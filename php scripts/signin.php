<?php
session_start();
//Script para procesar formulario de inicio de sesión
// Datos del formulario de registro
if ($_POST['password'] != $_POST['password2']) {
    header("Location: ../signin.php");
}

$email = $_POST['email'];
$_SESSION['email'] = $email;
$_SESSION['password'] = $_POST['password'];

// Crear la conexión
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

// Verificar la conexión
if ($conexiónPDO->connect_error) {
    die("Conexión fallida: " . $conexiónPDO->connect_error);
}

$sql = "SELECT * FROM `usuarios` WHERE `email_usuario` = '$email'";
$result = $conexiónPDO->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // El usuario ya existe, mostrar un mensaje de error o realizar alguna acción adicional
    header("Location: ../signin.php");
    //echo "El usuario ya está registrado.";
} else {
    // El usuario no existe, se puede proceder con el registro para insertar los datos del nuevo usuario en la base de datos
    //echo "Registro exitoso.";

    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $password = $_POST['password'];


    $sql = "INSERT INTO `usuarios` VALUES('', ?, ?, ?, 2, ?, '', '', ?, '', '', 0);";
    $stmt = $conexiónPDO->prepare($sql);

    // Limpiar y vincular los parámetros
    $stmt->bind_param("sssss", $clean_name, $clean_apellidoP, $clean_apellidoM, $clean_email, $clean_password);
    $clean_name = $conexiónPDO->real_escape_string($nombre); //$clean_name = mysqli_real_escape_string($conexiónPDO, $nombre);
    $clean_apellidoP = $conexiónPDO->real_escape_string($apellidoPaterno); //$clean_apellidoP = mysqli_real_escape_string($conexiónPDO, $apellidoPaterno);
    $clean_apellidoM = $conexiónPDO->real_escape_string($apellidoMaterno); //$clean_apellidoM = mysqli_real_escape_string($conexiónPDO, $apellidoMaterno);
    $clean_email = $conexiónPDO->real_escape_string($email); //$clean_email = mysqli_real_escape_string($conexiónPDO, $email);
    $clean_password = $conexiónPDO->real_escape_string($password); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);

    // Ejecutar la sentencia preparada
    $stmt->execute();

    // Verificar el éxito de la inserción
    if ($stmt->affected_rows > 0) {
        echo "Registro exitoso.";
        header("Location: auth_key.php");
    } else {
        echo "Error al registrar el usuario.";
    }
}

// Cerrar la conexión
$conexiónPDO->close();
