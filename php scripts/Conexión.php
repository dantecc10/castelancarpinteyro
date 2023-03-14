<?php
include "secrets.php";

$conexión = mysqli_connect("localhost", "castelancarpinteyro", "$contraseñaDBcastelancarpinteyro", "castelancarpinteyro");

$conexión[1] = mysqli_connect("localhost", "castelancarpinteyro", "$contraseñaDBcastelancarpinteyro", "castelancarpinteyro");
$conexión[2] = new mysqli("localhost", "castelancarpinteyro", "$contraseñaDBcastelancarpinteyro", "castelancarpinteyro");
$conexiónPDO = new mysqli("localhost", "castelancarpinteyro", "$contraseñaDBcastelancarpinteyro", "castelancarpinteyro");
