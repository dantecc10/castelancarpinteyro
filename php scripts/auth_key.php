<?php
session_start();
if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = $_SESSION['email'];
}

function generateKey($email)
{ // Operative ✅
    # $contadorDígitos = 0;
    $min = 100000;
    $max = 999999;
    # $dígitoAleatorioGenerado = rand(1, $max);
    $auth_key = rand($min, $max);

    //$auth_key = 486753; // Debug 🐞
    // Crear la conexión
    include "dynamicSecrets.php";
    $data = generatePasskey('sql');
    
    $conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);

    // Verificar la conexión
    if ($conexiónPDO->connect_error) {
        die("Conexión fallida: " . $conexiónPDO->connect_error);
    }

    $key_compare = $auth_key;
    $sql = "SELECT * FROM `auth_keys` WHERE ((`auth_key` = '$key_compare') OR (`related_email` = '$email')) AND (`status` = 'Enabled')";
    $result = $conexiónPDO->query($sql);

    if ($result->num_rows > 0) {
        $conexiónPDO->close();
        return null;
    } else {
        $conexiónPDO->close();
        return $auth_key;
    }
}

$auth_key = generateKey($email);
$contador = 0;
while ($contador < 5) {
    //echo "Esto no se debería ver"; // Debug 🐞
    if ($auth_key == null) {
        $auth_key = generateKey($email);
    } else {
        $data = generatePasskey('sql');

        $conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);
        $sql = "INSERT INTO `auth_keys` VALUES ('', $auth_key, ?, 'Enabled', CURRENT_TIMESTAMP())";
        $stmt = $conexiónPDO->prepare($sql);
        // Limpiar y vincular los parámetros
        $stmt->bind_param("s", $clean_email);
        $clean_email = $conexiónPDO->real_escape_string($email); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
        // Ejecutar la sentencia preparada
        $stmt->execute();

        // Verificar el éxito de la inserción
        if ($stmt->affected_rows > 0) {
            //echo "Generación y almacenamiento de clave exitosos."; // Debug 🐞
            $_SESSION["key"] = $auth_key;
            $_SESSION["email"] = $clean_email;
            header("Location: send_key_mail.php");
        } else {
            echo "Error al almacenar y/o generar la clave."; // Debug 🐞
        }

        // Cerrar la conexión
        $conexiónPDO->close();
        break;
    }
    $contador++;
}
if ($contador == 5) {
    # code...
}
//echo $auth_key; // Debug 🐞
