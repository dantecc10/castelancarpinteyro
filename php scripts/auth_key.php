<?php
function generateKey() // Operativa ✅
{
    # $contadorDígitos = 0;
    $min = 100000;
    $max = 999999;
    # $dígitoAleatorioGenerado = rand(1, $max);
    $claveRecuperación = rand($min, $max);

    # echo $claveRecuperación;
    return $claveRecuperación;
}