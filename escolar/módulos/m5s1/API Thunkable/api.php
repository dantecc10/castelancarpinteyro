<?php
if (null !== $_GET('cargaGET')) {
    $cargaPrueba = $_GET('cargaGET');
    if ($cargaPrueba = "Info") {
        phpinfo();
    } else {
        echo "No se recibió el mensaje 'Info'";
    }
} else {
    echo "No se obtuvo el valor de cargaGET";
}