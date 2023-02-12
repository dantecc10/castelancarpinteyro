<?php
function seleccionarConstructor($objetivo)
{
    switch ($objetivo) {
        case 1:
            include "construirCarruselPrincipal.php";
            break;
        case 2:
            include "construirTarjetasColores.php";
            break;

        default:
            echo "Parámetros de contrucción no definidos o valores enviados incorrectamente";
            break;
    }
}
