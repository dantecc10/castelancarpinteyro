<?php
$cargaPrueba = $_GET('cargaGET');

if ($cargaPrueba = "Info") {
    phpinfo();
} else {
    echo "No se recibió el mensaje 'Info'";
}
