<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "dante@castelancarpinteyro.club";
$to = "dantecc10@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail works just fine";
$headers = "From:" . $from;
mail($to, $subject, $message, $headers);

echo "The email message was sent.";


//Segunda parte
use PHPMailer/PHPMailer/PHPMailer;

require '../vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'dante@castelancarpinteyro.club';
$mail->Password = 'YOUR PASSWORD HERE';
$mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
$mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
$mail->addAddress('example@email.com', 'Receiver Name');
$mail->Subject = 'Testing PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is a plain text message body';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
