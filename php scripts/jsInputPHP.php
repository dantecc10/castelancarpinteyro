<?php
// Obtener la clave y el email del formulario
$clave = $_POST["clave"];
$email = $_POST["email"];
$tries = $_POST["tries"];

// Conectar a la base de datos
$db = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

// Verificar si la clave y el email están en la tabla auth_keys
$query = "SELECT * FROM `auth_keys` WHERE (`auth_key` = ?) AND (`related_email` = ?) AND (`status` = 'Enabled')";
$stmt = $db->prepare($query);
$stmt->bind_param("ss", $clave, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // La clave y el email son válidos
    echo "true";
} else {
    // La clave o el email no son válidos
    if ($tries > 5) {
        // Deshabilitar clave
        $query = "UPDATE `auth_keys` SET `status`='Disabled' WHERE (`auth_key` = ?) AND (`related_email` = ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ss", $clave, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        // Dar respuesta para AJAX
        echo "disabled";
    } else {
        echo "false";
    }
}

$db->close();
