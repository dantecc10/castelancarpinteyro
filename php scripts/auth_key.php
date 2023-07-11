<?php
function generateKey() // Operative ✅
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
    $sql = "SELECT * FROM `auth_keys` WHERE `auth_key` = '$key_compare'";
    $result = $conexiónPDO->query($sql);
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        
        //header("Location: ../signin.php");
        $conexiónPDO->close();
        echo "La clave ya está existe."; // Debug 🐞
        return null;
    } else {
        $conexiónPDO->close();
        return $auth_key;
    }
}


$auth_key = generateKey();
while ($auth_key == null) {
    echo "Esto no se debería ver";
    $auth_key = generateKey();
}
echo $auth_key;


// Cerrar la conexión