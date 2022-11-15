<?php
include "Scripts PHP/ConexiónUsuarios.php";
include "Scripts PHP/InicioSesión.php";
?>
<!DOCTYPE html>
<html lang="es-419">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dante Castelán Carpinteyro - Inicio</title>
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta property="og:image" content="https://kalicel.castelancarpinteyro.clubassets/img/DanteDEV-Black-Backgorund.png">
    <meta property="og:type" content="website">
    <meta name="description" content="Página de inicio de Dante Castelán Carpinteyro">
    <link rel="icon" type="image/jpeg" sizes="960x957" href="assets/img/Dante-DEV-Black-Background.png">
    <link rel="icon" type="image/jpeg" sizes="960x957" href="assets/img/Dante-DEV-Black-Background.png">
    <link rel="icon" type="image/jpeg" sizes="96F0x957" href="assets/img/Dante-DEV-Black-Background.png">
    <link rel="icon" type="image/jpeg" sizes="960x957" href="assets/img/Dante-DEV-Black-Background.png">
    <link rel="icon" type="image/jpeg" sizes="960x957" href="assets/img/Dante-DEV-Black-Background.png">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/extra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/Formulario.css">
    <link rel="icon" type="image/x-icon" href="assets/img/logos/DanteDEV.png">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container">
            <img src="assets/img/logos/DanteDEV-Black-Blackground-1-1.png" id="LogoNavBar">
            <a id="títuloNavBar" href="#page-top">Dante</a>
            <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Reparaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#políticas">Políticas de garantía</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                    <li class="btn btn-primary btn-success"><a onclick="document.getElementById('DivInicioSesión').style.display='block'" class="IniciarSesión nav-link" style="width:auto;" id="BotónAbreInicioSesión">Iniciar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/pcb-blackwebp.webp');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in bordeRojo">
                    <span id="bienvenida-kalicel">Bienvenido, soy Dante</span>
                </div>
                <div class="intro-heading text-uppercase bordeRojo">
                    <span>CASTELÁN CARPINTEYRO</span>
                </div>
                <a class="btn btn-primary btn-xl text-uppercase " role="button" href="#servicios">Explorar</a>
            </div>
        </div>
    </header>
    <section id="servicios">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Servicios</h2>
                    <h3 class="text-muted section-subheading"></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-code fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="section-heading">Programación web</h4>
                    <p class="text-muted">
                        Creación, maquetado y desarrollo de aplicaciones web,
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-server fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="section-heading">Web hosting</h4>
                    <p class="text-muted">
                        Adminitración de servidores, dominios, y repositorios remotos.
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="section-heading">Datos y seguridad</h4>
                    <p class="text-muted">
                        Manejo de bases de datos, y protección de integridad de la información a través de inicios de sesión.
                    </p>
                </div>
                <!--<div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>-->
            </div>
        </div>
    </section>
    <section class="bg-dark" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Artículos</h2>
                    <h3 class="text-muted section-subheading">¿Te inicias en el desarrollo web? Aquí te dejo algunos artículos y videos para que puedas guiarte:</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal1" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Contrucción</h4>
                        <p class="text-muted">
                            de una base de datos.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal2" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/2/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Crear un sitio</h4>
                        <p class="text-muted">
                            con un repositorio de GitHub.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal3" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Formularios</h4>
                        <p class="text-muted">
                            con JavaScript.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal4" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Métodos POST y GET</h4>
                        <p class="text-muted">
                            para peticiones al servidor con PHP.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal5" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Creación de tablas</h4>
                        <p class="text-muted">
                            con información de bases de datos SQL.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal6" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Uso de AJAX</h4>
                        <p class="text-muted">
                            para filtrar información de una base de datos.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal6" data-bs-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/artículos/1/portada.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Crear una API</h4>
                        <p class="text-muted">
                            usando JSON, y desplegándola en GitHub.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="políticas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php
                    include 'políticas-garantía.php';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light" id="team">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="rounded-circle mx-auto" src="assets/img/team/luis_erf.png">
                        <h4>Luis Enrique Reyes Fernández</h4>
                        </p>
                        <p class="text-muted">
                            Ingeniería Mecatrónica
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.facebook.com/qiiqeziithoo.reyezz"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://wa.me/522411352236?text=Hola,%20quiero%20consultar%20acerca%20de%20una%20reparación...%20"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-messenger"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="rounded-circle mx-auto" src="assets/img/team/rosalba_nzm.png">
                        <h4>Rosalba Nazareth Zárate Morales</h4>
                        <p class="text-muted">
                            Ingeniería Mecatrónica
                        </p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.facebook.com/rosalba.zarate.171098"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://wa.me/522225209776?text=Hola,%20quiero%20consultar%20acerca%20de%20una%20reparación...%20"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="rounded-circle mx-auto" src="assets/img/kalicel-staff.png">
                        <h4>Dante Castelán Carpinteyro</h4>
                        <p class="text-muted">
                            --
                        </p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.facebook.com/DanteCC10.4T/"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://wa.me/527979773095?text=Hola,%20quiero%20consultar%20acerca%20de%20una%20reparación...%20"><i class="fa fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" style="background-image:url('assets/img/map-image.png');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Contáctanos</h2>
                    <h3 class="text-muted section-subheading">Solicita una cotización o háznos llegar tus dudas.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactoForm" name="contactoForm" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input class="form-control" type="text" id="name" placeholder="Nombre completo *" required=""><small class="form-text text-danger flex-grow-1 help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="email" id="email" placeholder="Correo electrónico *" required=""><small class="form-text text-danger help-block lead"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" type="tel" placeholder="Teléfono *" required=""><small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <textarea class="form-control" id="message" placeholder="Mensaje o duda *" required=""></textarea><small class="form-text text-danger help-block lead"></small>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright&nbsp;© Dante Castelán Carpinteyro - <i>Führer Industries</i> - 2022</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="https://www.facebook.com/dante.castelan.carpinteyro"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://wa.me/527979773095?text=Hola,%20tengo%20algunas%20dudas%20sobre%20programación"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.twitter.com/dantecc10"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.github.com/dantecc10"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Política de privacidad</a></li>
                        <li class="list-inline-item"><a href="#">Términos de uso</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php
    include('modales.php');
    include('IniciarSesión.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>