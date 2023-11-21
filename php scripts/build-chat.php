    <?php
    //Importar archivo que vuelque $a y los compare

    function showTestHTML($a)
    {
        include "chat-configs.php";
        echo (
            $apMaxChatContainer .
            $apChatContainerContacts .
            $apUniqueContactContaine
            . "Dante Castelán Carpinteyro" .
            $ciUniqueContactContaine .
            $ciChatContainerContacts
            .
            $apChatContainerMessages . $a . $clChatContainerMessages .
            $clMaxChatContainer
        );
    }

    function fetchChat()
    {
        include "sync-msg.php";
        include "chat-configs.php";

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
            return $echoVar;
        } else {
            echo "Aquí no hay nada de chats.";
            return null;
        }
    }
    if (fetchChat() != null) {
        showTestHTML(fetchChat());
    } else {
        header("Location: ../account.php");
    }
    ?>