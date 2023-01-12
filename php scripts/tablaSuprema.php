<?php
include "Conexión.php";
$tablaSQL = "productos"; // Línea de configuración
$campos = ['id', 'nombre', 'descripción', 'precio', 'existencia', 'color', 'activo']; // Línea de configuración

$consulta = ("SELECT * FROM `" . $tablaSQL  . "`");
$resultado = mysqli_query($conexión, $consulta) or die("Error en la consulta a la base de datos");

echo "<table>"; // Súpercontenedor

echo "<tr>"; // Contenedor cíclico

for ($i = 1; $i < count($campos); $i++) {
    echo "<th>" . $campos[$i] . "</th>";
    $camposSQL[$i] = ($campos[$i] . "_" . substr_replace($tablaSQL, "", -1));
}

echo "</tr>"; // Contenedor cíclico

while ($columna = mysqli_fetch_array($resultado)) {
    echo "<tr>"; // Contenedor cíclico
    for ($i = 1; $i < count($campos); $i++) {
        echo "<td>" . $columna[$camposSQL[$i]] . "</td>";
    }
    echo "</tr>"; // Contenedor cíclico
}

echo "</table>"; // Súpercontenedor