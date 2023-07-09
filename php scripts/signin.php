<?php
//Script para procesar formulario de inicio de sesión
include 'Conexión.php';

// Configuración de la conexión a la base de datos
//$servername = "localhost";
//$username = "nombre_usuario";
//$password = "contraseña";
//$dbname = "nombre_base_de_datos";

// Datos del formulario de registro
$email = $_POST['email'];

// Crear la conexión
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

// Verificar la conexión
if ($conexiónPDO->connect_error) {
    die("Conexión fallida: " . $conexiónPDO->connect_error);
}

// Consulta para verificar si el usuario ya existe
$sql = "SELECT * FROM `usuarios` WHERE `email_usuario` = '$email'";
$result = $conexiónPDO->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // El usuario ya existe, mostrar un mensaje de error o realizar alguna acción adicional
    echo "El usuario ya está registrado.";
} else {
    // El usuario no existe, se puede proceder con el registro
    // Aquí puedes incluir el código para insertar los datos del nuevo usuario en la base de datos
    echo "Registro exitoso.";
}

// Cerrar la conexión
$conexiónPDO->close();
