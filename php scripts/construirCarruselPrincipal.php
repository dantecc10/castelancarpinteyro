<?php
#include "Conexión.php";
include "dynamicSecrets.php";
$data = generatePasskey('sql');

$conexión = mysqli_connect("localhost", $data[0], $data[1], $data[2]);
include "configsCarrusel.php";
$tablaSQL = "carrusel_principal_ítems"; // Línea de configuración
$campos = ['', 'id_ítem', 'título_ítem', 'descripción_ítem', 'link_ítem', 'imagen_ítem', 'activo_ítem']; // Línea de configuración

$consulta = ("SELECT * FROM `" . $tablaSQL  . "` WHERE (`activo_ítem` = true)");
$resultado = mysqli_query($conexión, $consulta) or die("Error en la consulta a la base de datos");

$carruselPrincipal = ""; // Súpercontenedor

$carruselÍtems .= $apSupCont1; // Contenedor estático de ítems
$carruselIndexes .= $apSupCont2; // Contenedor estático de indexes
$carruselCSS .= $apStyleCSS; // Contenedor estático de CSS

$contador = 1;
while ($columna = mysqli_fetch_array($resultado)) {
    $claseDinámicaCSS = ($baseClaseDinámicaCSS . $columna['id_ítem']);
    $carruselCSS .= ("div.carousel-hero.banner-carrusel-" . $contador . " {
        background-image: url('" . $columna['imagen_ítem'] . "');
    }
    ");
    for ($i = 0; $i < count($campos); $i++) {
        switch ($i) {
            case 1:
                if ($contador = 1) {
                    $carruselÍtems .= ($apCont1["a"][1] . $claseDinámicaCSS . $apCont1_1);
                    $carruselIndexes .= ($apCont2 . ($columna['id_ítem'] - 1) . $ciCont2["b"][1]);
                } else {
                    $carruselÍtems .= ($apCont1["a"][0] . $claseDinámicaCSS . $apCont1_1);
                    $carruselIndexes .= ($apCont2 . ($columna['id_ítem'] - 1) . $ciCont2["b"][0]);
                }
                break;
            case 2:
                $carruselÍtems .= ($apSubCont1 . $columna[$campos[$i]] . $ciSubCont1);
                break;
            case 3:
                $carruselÍtems .= ($apSubCont2 . $columna[$campos[$i]] . $ciSubCont2);
                break;
            case 4:
                $carruselÍtems .= ($apSubCont3 . $columna[$campos[$i]] . $ciSubCont3);
                break;

            default:
                # Error
                break;
        }
    }

    $carruselÍtems .= $ciCont1;
    $contador = $contador + 1;
}
// Clausura de variables para impresión
$carruselÍtems .= $ciSupCont1; // Contenedor estático de ítems
$carruselIndexes .= $ciSupCont2; // Contenedor estático de indexes
$carruselCSS .= $ciStyleCSS; // Contenedor estático de CSS

$carruselPrincipal .= $carruselÍtems;
$carruselPrincipal .= $carruselIndexes;
$carruselPrincipal .= $carruselCSS;
echo $carruselPrincipal;
