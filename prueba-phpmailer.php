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

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/phpmailer/phpmailer/src/Exception.php';



    //Código previo de .club
    #try {
    #    //Create an instance; passing `true` enables exceptions
    #    $mail = new PHPMailer(true);
    #    //Server settings
    #    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    #    SMTP::DEBUG_OFF;                   //Enable verbose debug output
    #    $mail->isSMTP();                                                             //Send using SMTP
    #    $mail->Host = "smtp.ionos.mx"; // GMail
    #    $mail->SMTPAuth = true;                                                    //Enable SMTP authentication
    #    $mail->Username = 'dante@castelancarpinteyro.com';                     //SMTP username
    #    $mail->Password = 'DarkseidPower22!!';                               //SMTP password
    #    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    #    $mail->Port = 587;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    #
    #    //Recipients
    #    $mail->setFrom('dante@castelancarpinteyro.com', 'Dante');
    #    $mail->addAddress('dantecc10@gmail.com', 'Dante');     //Add a recipient
    #    $mail->addAddress('jeremy.hdez9@gmail.com', 'Jeremías');     //Add a recipient
    #    $mail->addReplyTo('dante@castelancarpinteyro.com', 'Dante');
    #
    #    /*
    #    $mail->addReplyTo('info@example.com', 'Information');
    #    $mail->setFrom('no-reply@prueba-pagos.castelancarpinteyro.club', 'Tienda online');
    #    $mail->addCC('cc@example.com');
    #    $mail->addBCC('bcc@example.com'); 
    #    */
    #
    #    /*    //Envio de archivos
    #    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    #    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */    //Optional name
    #
    #    //Content
    #    $mail->isHTML(true);                                  //Set email format to HTML
    #    $mail->Subject = 'Detalles de compra';
    #    $cuerpo = '<h4>Gracias por su compra</h4>';
    #    $cuerpo .= ('<p>El ID de su compra es <b>' . $id_transacción . '</b></p>');
    #    $mail->Body    = imap_utf8($cuerpo);
    #    $mail->AltBody = 'Le enviamos los detalles de su compra.';
    #
    #    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');
    #
    #    $mail->send();
    #} catch (Exception $e) {
    #    echo "Error al enviar el correo electrónico de la compra: {$mail->ErrorInfo}";
    #    exit;
    #}
    //Fin de código previo de .club

    //Código de ChatGPT
    #$mail = new PHPMailer();
    #$mail->isSMTP();
    #$mail->Host = "webmail.castelancarpinteyro.com";
    #$mail->SMTPAuth = true;
    #$mail->Username = "dante@castelancarpinteyro.com";
    #$mail->Password = "DarkseidPower22!!";
    #$mail->SMTPSecure = "tls";
    #$mail->Port = "587";
    #
    #$mail->setFrom('dante@castelancarpinteyro.com', 'Probador de Scripts');
    #$mail->addAddress('jeremy.hdez9@gmail.com');
    #$mail->addReplyTo('dantecc10@gmail.com');
    #
    #$mail->isHTML(true);
    #
    #$mail->Subject = 'Pruebita';
    #$mail->Body = '<h1>Correo de prueba</h1><p>Este correo debe llegar porque me pondrá contento.</p>';
    #$mail->AltBody = 'Correito de prueba (modo plano)';
    #
    #if (!$mail->send()) {
    #    echo 'El mensaje no se pudo enviar.';
    #    echo 'Error: ' . $mail->ErrorInfo;
    #} else {
    #    echo 'El mensaje se envió correctamente';
    #}
    //Fin de código ChatGPT

    //Código versión 2 de ChatGPT
    #use PHPMailer\PHPMailer\PHPMailer;
    #use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php'; // Path a la carpeta de PHPMailer

    // Configuración del servidor SMTP
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'castelancarpinteyro.com'; // Cambiar por la dirección IP o el hostname del servidor SMTP
    $mail->SMTPAuth = true; // Cambiar a true si es necesario autenticar la conexión SMTP
    $mail->Port = 465; // Cambiar el puerto SMTP según la configuración del servidor
    $mail->Username = "dante@castelancarpinteyro.com";
    $mail->Password = "DarkseidPower22!!";

    // Configuración del correo
    $mail->setFrom('dante@castelancarpinteyro.com', 'Dante CC');
    $mail->addAddress('gamepass1@castelancarpinteyro.com', 'Xbox');
    $mail->Subject = 'Asunto del correo';
    $mail->Body = 'Esta es una prueba';

    // Envío del correo
    try {
        $mail->send();
        echo 'El correo se envió correctamente';
    } catch (Exception $e) {
        echo 'El correo no se pudo enviar. Error: ', $mail->ErrorInfo;
    }

    //Fin del código versión 2 de ChatGPT

    ?>
</body>

</html>