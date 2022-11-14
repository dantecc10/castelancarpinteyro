<?php
// echo "Conexión a la base de datos: exitosa";
$visitas;
// $sql = "UPDATE SET `visitas` = $actualizaVisitas";

$sql = $conexión->query("SELECT * FROM `visitas`");

$visitas = $datos->visitas;

$actualizaVisitas = ($visitas++);

$sql = $conexión->query("UPDATE `visitas` SET `visitas`=$actualizaVisitas");
