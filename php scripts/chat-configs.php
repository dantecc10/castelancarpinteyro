<?php
/*Los mensajes han de concatenarse en medio de estas variables para encerrar ese simple texto en código HTML
    formateable y estilizable*/
$apMsgReceived = "<div class='msg-container d-flex' justify-content-initial'>
                    <span class='received-msg msg rounded'>";
$clMsgReceived = "  </span>
                  </div>";

$apMsgSent = "<div class='msg-container d-flex justify-content-end'>
                    <span class='sent-msg msg rounded'>";
$clMsgSent = "      </span>
              </div>";

$apMaxChatContainer = "<div class='container py-5 max-msg-container'>
                        <div class='row d-flex justify-content-center'>";
$clMaxChatContainer = " </div>
                       </div>";

$apChatContainerContacts = "<div class='col col-lg-3'>
                                <div class='card'>
                                    <div class='card-header py-3'>
                                        <p class='text-primary card-title m-0 fw-bold'>Contactos</p>
                                    </div>
                                    <div class='card-body py-3'>";

$apUniqueContactContaine = "<div class='row sup-contact-container d-flex align-self-center'>
                                <div class='row d-flex justify-content-center'>
                                    <div class='mb-3 d-flex justify-content-center'>
                                        <div class='row d-flex'>
                                            <div class='col col-lg-3 col-mb-3'>
                                                <svg></svg>
                                            </div>
                                            <div class='col col-lg-9 col-mb-9'>
                                                <p class='p-contacto'>";
$ciUniqueContactContaine = "                    </p>
                                            </div>
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
                                        <p class='text-primary card-title m-0 fw-bold'>Chat con Dante</p>
                                    </div>
                                    <div class='card-body py-3'>";

$clChatContainerMessages = "        </div>
                                    <div class='card-footer py-1'>
                                        <div class='row d-flex'>
                                            <div class='col d-flex col-sm-10 col-md-10 col-lg-10'>
                                                <textarea class='textarea-msg'></textarea>
                                            </div>
                                            <div class='col d-flex p-0 m-0 col-sm-2 col-md-2 col-lg-2'>
                                                <div class='btn btn-primary send-div'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' fill='#AF40FF' height='64px' width='64px' version='1.1' id='Layer_1' viewBox='-35.84 -35.84 583.68 583.68' xml:space='preserve' stroke='#AF40FF' transform='matrix(1, 0, 0, 1, 0, 0)rotate(0)' stroke-width='0.00512' style='height: 70%;width: 100%;color:  white !important;'>
                                                        <g id='SVGRepo_bgCarrier' stroke-width='0'></g>                                                
                                                        <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>
                                                        <g id='SVGRepo_iconCarrier'> <g> <g> <path d='M508.645,18.449c-2.929-2.704-7.133-3.51-10.826-2.085L6.715,204.446c-3.541,1.356-6.066,4.515-6.607,8.264 c-0.541,3.75,0.985,7.496,3.995,9.796l152.127,116.747c-0.004,0.116-0.575,0.224-0.575,0.342v83.592 c0,3.851,2.663,7.393,6.061,9.213c1.541,0.827,3.51,1.236,5.199,1.236c2.026,0,4.181-0.593,5.931-1.756l56.12-37.367 l130.369,99.669c1.848,1.413,4.099,2.149,6.365,2.149c1.087,0,2.186-0.169,3.248-0.516c3.27-1.066,5.811-3.672,6.786-6.974 L511.571,29.082C512.698,25.271,511.563,21.148,508.645,18.449z M170.506,321.508c-0.385,0.36-0.7,0.763-1.019,1.163 L31.659,217.272L456.525,54.557L170.506,321.508z M176.552,403.661v-48.454l33.852,25.887L176.552,403.661z M359.996,468.354 l-121.63-93.012c-1.263-1.77-2.975-3.029-4.883-3.733l-47.29-36.163L480.392,60.86L359.996,468.354z'></path></g></g></g>                                                
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
