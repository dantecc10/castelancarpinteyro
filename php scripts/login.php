<?php
include "Conexión.php";

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo ("Conexión establecida");
}

#$username = mysqli_real_escape_string($conexiónPDO, $_POST['username']);
#$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']);
