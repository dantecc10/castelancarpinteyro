<?php
include "build-chat.php";
/*Los mensajes han de concatenarse en medio de estas variables para encerrar ese simple texto en código HTML
    formateable y estilizable*/
$apMsgReceived = "<div class='msg-container align-items-left'>
                    <span class='received-msg'>";
$clMsgReceived = "  </span>
                  </div>";

$apMsgSent = "<div class='msg-container align-items-left'>
                    <span class='sent-msg'>";
$clMsgSent = "      </span>
              </div>";

$apMaxChatContainer = "<div class='row'>";
$clMaxChatContainer = "</div>";

$apChatContainerContacts = "<div class='col col-lg-3'>
                                <div class='card'>
                                    <div class='card-header py-3'>
                                        <p class='text-primary m-0 fw-bold'>Contactos</p>
                                    </div>
                                    <div class='card-body py-3'>";

$apUniqueContactContaine = "<div class='row sup-contact-container d-flex align-self-center'>
                                <div class='col d-flex'>
                                    <div class='mb-3 d-flex'>
                                        <div class='d-flex align-items-start'>
                                            <p>";
$apUniqueContactContaine = "               </p>
                                        </div>                                                
                                    </div>                                                
                                </div>
                            </div>";

$clChatContainerContacts = "
                                    </div>
                                </div>
                            </div>";

$apChatContainerMessages = "<div class='col col-lg-9'>
                                <div class='card'>
                                    <div class='card-header py-3'>
                                        <p class='text-primary m-0 fw-bold'>Chat con Dante</p>
                                    </div>
                                    <div class='card-body py-3'>";

$clChatContainerMessages = "        </div>
                                </div>
                            </div>";

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
    $echoVar
    .
    $clChatContainerMessages . $clMaxChatContainer
);
