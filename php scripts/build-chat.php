<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de chat</title>
    <link rel="stylesheet" href="msg.css">
</head>

<body>

    <?php
    session_start();
    include "chat-configs.php";

    if (isset($_SESSION['chat'])) {

        for ($i = 0; $i < $_SESSION['límite']; $i++) {

            echo "Mensaje: ";

            var_dump($_SESSION['chat']);
            if ($_SESSION['chat']['chat']['sender_msg'] == $_SESSION['id']) {
                // El mensaje fue enviado por el usuario logeado
                echo ("Del usuario " . $_SESSION['chat']['chat']['sender_msg'] . ", para el usuario " . $_SESSION['chat']['chat']['receiver_msg'] . ":" . $apMsgSent . $_SESSION['chat']['chat']['content_msg'][$i] . $clMsgSent);
            } else {
                // El mensaje fue enviado por el otro usuario
                echo ("Del usuario " . $_SESSION['chat']['chat']['sender_msg'] . ", para el usuario " . $_SESSION['chat']['chat']['receiver_msg'] . ":" . $apMsgReceived . $_SESSION['chat']['chat']['content_msg'][$i] . $clMsgReceived);
            }
        }
    } else {
        echo "Aquí no hay nada de chats.";
    }
    ?>

</body>

</html>