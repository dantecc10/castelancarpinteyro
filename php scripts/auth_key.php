<?php
$email = $_GET['email'];
function generateKey($email) // Operative ✅
{
    # $contadorDígitos = 0;
    $min = 100000;
    $max = 999999;
    # $dígitoAleatorioGenerado = rand(1, $max);
    $auth_key = rand($min, $max);

    //$auth_key = 486753; // Debug 🐞
    // Crear la conexión
    $conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");
    
    // Verificar la conexión
    if ($conexiónPDO->connect_error) {
        die("Conexión fallida: " . $conexiónPDO->connect_error);
    }

    $key_compare = $auth_key;
    $sql = "SELECT * FROM `auth_keys` WHERE ((`auth_key` = '$key_compare') OR (`related_email` = '$email')) AND (`status` = 'Active')";
    $result = $conexiónPDO->query($sql);
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        
        //header("Location: ../signin.php");
        $conexiónPDO->close();
        //echo "La clave ya está existe o esa cuenta ya tiene una clave."; // Debug 🐞
        return null;
    } else {
        $conexiónPDO->close();
        return $auth_key;
    }
}


    $auth_key = generateKey($email);
    while ($auth_key == null) {
    //echo "Esto no se debería ver"; // Debug 🐞
    $auth_key = generateKey($email);
    }
    //echo $auth_key; // Debug 🐞

    $conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");
    $sql = "INSERT INTO `auth_keys` VALUES ('', $auth_key, ?, 'Active', CURRENT_TIMESTAMP())";
    $stmt = $conexiónPDO->prepare($sql);
    // Limpiar y vincular los parámetros
    $stmt->bind_param("s", $clean_email);
    $clean_email = $conexiónPDO->real_escape_string($email); //$clean_password = mysqli_real_escape_string($conexiónPDO, $password);
    // Ejecutar la sentencia preparada
    $stmt->execute();

    // Verificar el éxito de la inserción
    if ($stmt->affected_rows > 0) {
        //echo "Generación y almacenamiento de clave exitosos."; // Debug 🐞
        header("Location: ../verify.php");
    } else {
        echo "Error almacenar y/o generar la clave."; // Debug 🐞
    }

    // Cerrar la conexión
    $conexiónPDO->close();
