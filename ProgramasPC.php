<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../IMG/FAVICON TRANSPARENTE.png" type="image/x-icon">
    <link id="EtiquetaCSS" rel="Stylesheet" href="../CSS/CSS GLOBAL - TEMA OSCURO.css" Type="text/css" MEDIA="screen">
    <!--<link id="Oculta/Muestra" rel="Stylesheet" href="../CSS/CSS OCULTAMIENTO.css" Type="text/css" MEDIA="screen">-->

    <meta name="description" content="Dante Castelán Carpinteyro: Web dedicada a publicación de proyectos y código personal.">
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dante - Inicio</title>
</head>

<body>
    <script src="../JavaScript/CambiarTema.js"></script>
    <!--Encabezado (no mover)--> <br>
    <header id="Encabezado">
        <div id="Contenedor-Encabezado">
            <div id="Contenido-Encabezado">
                <h1>Inicio</h1> <a href="index.php"> <img id="Logo" src="IMG/DanteDEV-Black-Background.png" alt="dante.castelancarpinteyro.club">
                </a>
                <div class="Menú-Desplegable"> <button class="Botón-Desplegar">Menú</button>
                    <div class="Contenido-Desplegable">
                        <a href="IniciarSesión.php">Iniciar Sesión</a>
                        <a href="https://politiza.castelancarpinteyro.club/">POLITIZA MX</a>
                        <a href="ProgramasPC.php">Programas avanzados para PC</a>
                        <a href="AcercaDe.php">Acerca de...</a>
                        <a id="CambiaTema" onclick="javascript:CambiarTema();">Cambiar tema</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="Encabezado-Superior"></div>
        <div id="Encabezado-Inferior"></div>
    </header>

    <h2 id="IndicaArtículos">Programas avanzados para PC</h2>
    <div class="Contenedor-Artículos" id="PartidosPolíticos">
        <h4 class="Autor-Artículo">Por Dante Castelán Carpinteyro.</h4>
        <h3 class="TítuloArtículo">Enlace</h3>
        <p class="Descripción-Artículo"><a href="https://cecytepuebla-my.sharepoint.com/:f:/g/personal/d_castelanc_chg_2023_cecytepuebla_edu_mx/EoedF8GQeyNGoTTH1EWFB5ABJoaN8TzpFbPbBzNhYYR_sg?e=lAvdE3" target="_blank" rel="noopener noreferrer">
                Enlace directo a la carpeta.
            </a>
        </p>
    </div>
    <footer>
        <div id="RedesSociales" align="center">
            <hr id="AntesSociales">
            <script lang="JavaScript" src="../JavaScript/Redes Sociales.js"></script> 
            <h3><a href="mailto:dantecc10@gmail.com" class="TítuloArtículo" id="ContactoCorreo">Contacto</a></h3>
            <img class="RedSocial" alt="Ícono de Facebook" id="Facebook" onclick="javascript:AbrirFacebook();" src="../IMG/íconoFacebook.png" />
            <img class="RedSocial" alt="Ícono de WhatsApp" id="WhatsApp" onclick="javascript:AbrirWhatsApp();" src="../IMG/íconoWhatsApp.png" />
            <img class="RedSocial" alt="Ícono de Messenger" id="Messenger" onclick="javascript:AbrirMessenger();" src="../IMG/íconoMessenger.png" />
            <img class="RedSocial" alt="Ícono de YouTube" id="YouTube" onclick="javascript:AbrirYouTube();" src="../IMG/íconoYouTube.png" />
            <img class="RedSocial" alt="Ícono de Telegram" id="Telegram" onclick="javascript:AbrirTelegram();" src="../IMG/íconoTelegram.png" />
            <img class="RedSocial" alt="Ícono de Twitter" id="Twitter" onclick="javascript:AbrirTwitter();" src="../IMG/íconoTwitter.png" />
            <img class="RedSocial" alt="Ícono de GitHub" id="GitHub" onclick="javascript:AbrirGitHub();" src="../IMG/íconoGitHub.png" />
        </div>
        <p id="copyright">Copyright © Dante Castelán Carpinteyro - <i>Führer Industries</i> - 2022</p>
    </footer>
</body>

</html>