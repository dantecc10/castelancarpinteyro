<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo</title>
</head>

<body>
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    require "vendor/autoload.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "webmail.castelancarpinteyro.com";
    $mail->SMTPAuth = true;
    $mail->Username = "dante@castelancarpinteyro.com";
    $mail->Password = "DarkseidPower22!!";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";

    $mail->setFrom('dante@castelancarpinteyro.com', 'Probador de Scripts');
    $mail->addAddress('jeremy.hdez9@gmail.com');
    $mail->addReplyTo('dantecc10@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'Pruebita';
    $mail->Body = '<h1>Correo de prueba</h1><p>Este correo debe llegar porque me pondrá contento.</p>';
    $mail->AltBody = 'Correito de prueba (modo plano)';

    if (!$mail->send()) {
        echo 'El mensaje no se pudo enviar.';
        echo 'Error: ' . $mail->ErrorInfo;
    } else {
        echo 'El mensaje se envió correctamente';
    }
    ?>
</body>

</html>