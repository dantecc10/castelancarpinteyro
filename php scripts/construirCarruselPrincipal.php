<?php
include "Conexión.php";
include "configsCarrusel.php";
$tablaSQL = "carrusel_principal_ítems"; // Línea de configuración
$campos = ['', 'id_ítem', 'título_ítem', 'descripción_ítem', 'link_ítem', 'imagen_ítem', 'activo_ítem']; // Línea de configuración

$consulta = ("SELECT * FROM `" . $tablaSQL  . "` WHERE (`activo_ítem` = true)");
$resultado = mysqli_query($conexión, $consulta) or die("Error en la consulta a la base de datos");

$carruselPrincipal; // Súpercontenedor

$carruselÍtems = $apSupCont1; // Contenedor estático de ítems
$carruselIndexes = $apSupCont2; // Contenedor estático de indexes

$contador = 1;
while ($columna = mysqli_fetch_array($resultado)) {
    if ($contador = 1) {
        $carruselÍtems .= $apCont1[1];
        $carruselIndexes .= ($apCont2 . ($contador - 1) . $ciCont2[1]);
    } else {
        $carruselÍtems .= $apCont1[0];
        $carruselIndexes .= ($apCont2 . ($contador - 1) . $ciCont2[0]);
    }

    for ($i = 1; $i < count($campos); $i++) {
        switch ($i) {
            case 2:
                $carruselÍtems .= ($apSubCont1 . $resultado[$campos[$i]] . $ciSubCont1);
                break;
            case 3:
                $carruselÍtems .= ($apSubCont2 . $resultado[$campos[$i]] . $ciSubCont2);
                break;
            case 4:
                $carruselÍtems .= ($apSubCont3 . $resultado[$campos[$i]] . $ciSubCont3);
                break;

            default:
                # Error
                break;
        }
        #$camposSQL[$i] = ($campos[$i] /* . "_" . substr_replace($tablaSQL, "", -1)*/);
    }

    $carruselÍtems .= $ciCont1;

    $contador++;
}

$carruselÍtems .= $ciSupCont1; // Contenedor estático de ítems
$carruselIndexes = $ciSupCont2; // Contenedor estático de indexes

$carruselPrincipal .= ($carruselÍtems . $carruselIndexes);
echo $carruselPrincipal;
