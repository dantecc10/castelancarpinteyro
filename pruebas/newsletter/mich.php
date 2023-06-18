<?php

use function PHPMailer\PHPMailer\setMailParameters;

include "../../php scripts/dynamicMailSettings.php";
setMailParameters('newsletter');

// Configuración de la conexión a la base de datos
//$servername = "localhost";
//$username = "nombre_de_usuario";
//$password = "contraseña";
//$dbname = "nombre_de_la_base_de_datos";

// Conexión a la base de datos
$conn = new mysqli("localhost", "darkseid", "DarkseidPower22!!", "castelancarpinteyro");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener la fecha actual en formato 'YYYY-MM-DD'
$fecha_actual = date('Y-m-d');

// Consulta SQL para seleccionar los registros con fecha igual a la fecha actual
$sql = "SELECT * FROM `test_mn` WHERE `fecha_mn` = '$fecha_actual'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorrer los resultados y ejecutar la función "saludar($i)"
    while ($row = $result->fetch_assoc()) {
        $id = $row['id_mn'];
        saludar($id);

        $mail->ClearAllRecipients();

        $mail->AddAddress("dantecc10@gmail.com");
        $mail->AddCC("dante@castelancarpinteyro.com");
        //$mail->AddCC("concopia2@email.com");

        $mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
        $mail->Subject = 'Correo de prueba del newsletter de Castelán Carpinteyro';

        $msg = "<h1>¡Hola" . $row['nombre_destino_mn'] . "</h1>
            <p>Según la base de datos, hoy " . $row['fecha_mn'] . " hay un mensaje para tí desde el newsletter</p>
            <p>De parte de <b><i>Dante Castelán Carpinteyro</i></b>, recibe el siguiente mensaje: '" . $row['contenido_mn'] . "'.</p>
            <p>¡Gracias por ser parte de mis pruebas en el servidor! Me ayudas mucho. Por favor, siéntete libre de responder a este correo o por el medio que desees más mensajes personalizados para que los programe.</p>
        ";

        $mail->Body = $msg;
        $mail->Send();
    }
} else {
    echo "No se encontraron registros con la fecha actual.";
}

// Cerrar la conexión a la base de datos
$conn->close();

// Función "saludar"
function saludar($i)
{
    echo "Saludando al registro con ID: " . $i . "<br>";
    // Realizar otras acciones con el registro...
}
