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

        $objeto = $_SESSION['chat'];
        // Verificar si el objeto es válido
        if ($objeto) {
            // Recorrer las propiedades del objeto
            foreach ($objeto as $clave) {
                echo ("Mensaje");
                if ($objeto->$sender_msg == $_SESSION['id']) {
                    //El mensaje fue enviado por el usuario logeado
                    echo ($apMsgSent . $objeto->content_msg . $clMsgSent);
                } else {
                    //El mensaje fue enviado por el otro usuario
                    echo ($apMsgReceived . $objeto->content_msg . $clMsgReceived);
                }
            }
        } else {
            echo "El objeto no está disponible en la sesión.";
        }
    }else{
        echo "Aquí no hay nada de chats.";
    }
    ?>
</body>

</html>