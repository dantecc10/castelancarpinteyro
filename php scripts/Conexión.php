<?php
include "secrets.php";
$contraseñaDB = $contraseñaDBcastelancarpinteyro;

$conexión = mysqli_connect("localhost", "castelancarpinteyro", $contraseñaDB, "castelancarpinteyro");

$conexión[1] = mysqli_connect("localhost", "castelancarpinteyro", $contraseñaDB, "castelancarpinteyro");
$conexión[2] = new mysqli("localhost", "castelancarpinteyro", $contraseñaDB, "castelancarpinteyro");
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", $contraseñaDB, "castelancarpinteyro");
