<?php
// Descarga un archivo en cuanto se cargue la página
if (isset($_GET['descarga'])) {
    $archivo = $_GET['descarga'];
    header('Content-Type: application/octet-stream');  // Establece el tipo de contenido a descargar
    header("Content-Disposition: attachment; filename=\"$archivo\"");   // Establece nombre del archivo que se va a
    //continúa
} else {
    echo "No hay archivos para descargar";
}
