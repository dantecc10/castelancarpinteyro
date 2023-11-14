    <?php
    session_start();
    include "chat-configs.php";
    function showTestHTML($a)
    {
        include "chat-configs.php";
        echo (
            $apMaxChatContainer . $apChatContainerContacts .
            $apUniqueContactContaine
            .
            "Dante Castelán Carpinteyro"
            .
            $ciUniqueContactContaine . $ciChatContainerContacts
            .
            $apChatContainerMessages
            .

            $apMsgReceived .
            "¡Saludos!" .
            $clMsgReceived .

            $apMsgReceived .
            "¡Tengo una pregunta!" .
            $clMsgReceived .

            $apMsgReceived .
            "¿Cuánto tardará en estar listo el chat de texto?" .
            $clMsgReceived .

            $apMsgSent .
            "¡Hola! Espero lanzarlo en máximo un mes." .
            $clMsgSent .
            $a
            .
            $clChatContainerMessages . $clMaxChatContainer
        );
    }
    
    $echoVar = ""; // Debug
    if (isset($_SESSION['chat'])) {
        for ($i = 0; $i < $_SESSION['límite']; $i++) {
            //echo "Mensaje ";
            //var_dump($_SESSION['chat']);
            if ($_SESSION['chat']['chat']['sender_msg'][$i] == $_SESSION['id']) {
                // El mensaje fue enviado por el usuario logeado
                //echo (/*"del usuario " . $_SESSION['chat']['chat']['sender_msg'][$i] . ", para el usuario " . */$_SESSION['chat']['chat']['receiver_msg'][$i] . ":" . $apMsgSent . $_SESSION['chat']['chat']['content_msg'][$i] . $clMsgSent);
                $echoVar = ($echoVar . $apMsgSent . $_SESSION['chat']['chat']['content_msg'][$i] . $clMsgSent);
            } else {
                // El mensaje fue enviado por el otro usuario
                $echoVar = ($echoVar . $apMsgReceived . $_SESSION['chat']['chat']['content_msg'][$i] . $clMsgReceived);
            }
            //echo "<br>";
        }
        showTestHTML($echoVar);
    } else {
        echo "Aquí no hay nada de chats.";
        header("Location: ../account.php");
    }
    ?>