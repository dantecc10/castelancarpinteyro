<?php
include "Conexión.php";
$tablaSQL = "carrusel_principal_ítems"; // Línea de configuración
$campos = ['', 'id_ítem', 'título_ítem', 'descripción_ítem', 'link_ítem', 'imagen_ítem', 'activo_ítem']; // Línea de configuración

$consulta = ("SELECT * FROM `" . $tablaSQL  . "` WHERE (`activo_ítem` = true)");
$resultado = mysqli_query($conexión, $consulta) or die("Error en la consulta a la base de datos");

$carruselPrincipal .= "<table>"; // Súpercontenedor

echo "<tr>"; // Contenedor cíclico

for ($i = 1; $i < count($campos); $i++) {
    $carruselPrincipal .= ("<th>" . $campos[$i] . "</th>");
    $camposSQL[$i] = ($campos[$i] /* . "_" . substr_replace($tablaSQL, "", -1)*/);
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