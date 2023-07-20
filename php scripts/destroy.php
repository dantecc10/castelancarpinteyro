<?php
function generatePasskey($turing)
{
    switch ($turing) {
        case 'contacto':
            $turing = "SecureMailSending23!!";
            $fromSettings = "Contacto";
            $emailSettings = "contacto@castelancarpinteyro.com";
            break;
        case 'newsletter':
            $turing = "NeuLetter23!!";
            $fromSettings = "Newsletter";
            $emailSettings = "newsletter@castelancarpinteyro.com";
            break;
        case 'development':
            $turing = ("pa$$" . "wordChipeda001");
            $fromSettings = "Development";
            $emailSettings = "development@castelancarpinteyro.com";
            break;
        case 'dante':
            $turing = "DarkseidPower23!!";
            $fromSettings = "Dante Castelán Carpinteyro";
            $emailSettings = "dante@castelancarpinteyro.com";
            break;
        case 'auth':
            $turing = "Authentica23!!";
            $fromSettings = "Verificación";
            $emailSettings = "autentica@castelancarpinteyro.com";
            break;
        case 'sql':
            //$db = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");
            $sqlRequest = true;
            $user = "castelancarpinteyro";
            $turing = "@CastelanCarpinteyroWEB";
            $database = "castelancarpinteyro";
            break;
        default:
            echo ("Se ha producido un error en la ejecución o los parámetros recibidos son incorrectos");
            break;
    }
    if ((isset($sqlRequest)) && ($sqlRequest == true)) {
        echo ($user . " " . $turing . " " . $database); // Debug 🐞
        return array($user, $turing, $database);
    } else {
        return array($turing, $fromSettings, $emailSettings);
    }
}

if (isset($_GET['turing'])) {
    $data = generatePasskey($_GET['turing']);
    // echo ($data[0] . " " . $data[1] . " " . $data[2]); // Debug command line
}
