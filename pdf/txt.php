<?php
// Abriendo el archivo
$archivo = fopen("prueba.html", "r");

// Recorremos todas las lineas del archivo
while (!feof($archivo)) {
    // Leyendo una linea
    $traer = fgets($archivo);
    // Imprimiendo una linea
    echo nl2br($traer);
}

// Cerrando el archivo
fclose($archivo);
