<?php

function getOnlineCSS($urls)
{
    $cssContent = '';

    // Recorre todas las URLs de los archivos CSS
    foreach ($urls as $url) {
        $ch = curl_init($url);

        // Configurar las opciones de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        // Ejecutar la solicitud cURL
        $cssContent .= curl_exec($ch);

        // Verificar si hubo algún error en la solicitud
        if (curl_errno($ch)) {
            //echo 'Error al obtener el archivo CSS: ' . curl_error($ch);
        }

        // Cerrar la sesión cURL
        curl_close($ch);
    }

    return $cssContent;
}

// URLs de los archivos CSS en línea
$cssUrls = array(
    'https://castelancarpinteyro.com/assets/bootstrap/css/bootstrap.min.css',
    'https://use.fontawesome.com/releases/v5.12.0/css/all.css',
    'https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap',
    'https://use.fontawesome.com/releases/v5.12.0/css/all.css',
    'https://castelancarpinteyro.com/assets/css/Accordion.css',
    'https://castelancarpinteyro.com/assets/css/Carousel-Hero.css',
    'https://castelancarpinteyro.com/assets/css/extra.css',
    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css',
    'https://castelancarpinteyro.com/assets/css/uiverse.css'
    // Agrega más URLs de archivos CSS si es necesario
);

// Obtener el contenido de los archivos CSS
$cssContent = getOnlineCSS($cssUrls);
/*
// Luego, puedes concatenar $cssContent en el mensaje HTML como desees
$msg = '<html lang="es-MX"><head>';
*/
//$msg .= '<style>' . $cssContent . '</style>';
$styleTag = '<style>' . $cssContent . '</style>';
/*
// Resto del contenido HTML de tu mensaje
$msg .= '</head><body>';
// Agrega el contenido del mensaje HTML aquí
$msg .= '</body></html>';

// Imprime el mensaje completo
echo $msg;
*/
?>