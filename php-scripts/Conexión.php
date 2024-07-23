<?php

// Crear la conexión
include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexión = mysqli_connect("localhost", $data[0], $data[1], $data[2]);;
$conexión[1] = mysqli_connect("localhost", $data[0], $data[1], $data[2]);;
$conexión[2] = new mysqli("localhost", $data[0], $data[1], $data[2]);;

//$conexión = mysqli_connect("localhost", $data[0], $data[1], $data[2]);

$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);
?>