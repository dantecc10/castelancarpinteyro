<?php
/*Los mensajes han de concatenarse en medio de estas variables para encerrar ese simple texto en código HTML
    formateable y estilizable*/
$apMsgReceived = "<div class='msg-container d-flex' style='justify-content: flex-initial;'>
                    <span class='received-msg'>";
$clMsgReceived = "  </span>
                  </div>";

$apMsgSent = "<div class='msg-container d-flex' style='justify-content: flex-end;'>
                    <span class='sent-msg'>";
$clMsgSent = "      </span>
              </div>";

$apMaxChatContainer = "<div class='container py-5 max-msg-container'>
                        <div class='row d-flex justify-content-center'>";
$clMaxChatContainer = " </div>
                       </div>";

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
$ciUniqueContactContaine = "               </p>
                                        </div>                                                
                                    </div>                                                
                                </div>
                            </div>";

$ciChatContainerContacts = "
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
