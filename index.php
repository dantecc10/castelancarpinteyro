<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="utf-8">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HV59T08TYC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HV59T08TYC');
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Castelán Carpinteyro - Inicio</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9258502939818184" crossorigin="anonymous"></script>

    <meta name="theme-color" content="#5436cd">
    <meta name="description" content="Programación; artículos, tutoriales y cursos disponibles para entusiastas de la programación en Castelán Carpinteyro.">
    <meta name="twitter:description" content="Cursos de programación y servicios de hosting web">
    <meta name="twitter:title" content="Castelán Carpinteyro">
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://castelancarpinteyro.com/assets/img/castelancarpinteyro/DanteDEV-Black-Blackground.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="https://castelancarpinteyro.com/assets/img/castelancarpinteyro/DanteDEV-Black-Blackground.png">
    <link rel="icon" type="image/png" sizes="4398x3333" href="assets/img/castelancarpinteyro/DanteDEV.png">
    <link rel="icon" type="image/png" sizes="4398x3333" href="assets/img/castelancarpinteyro/DanteDEV.png">
    <link rel="icon" type="image/png" sizes="4405x3333" href="assets/img/castelancarpinteyro/DanteDEV-Black-Blackground.png">
    <link rel="icon" type="image/png" sizes="4398x3333" href="assets/img/castelancarpinteyro/DanteDEV.png">
    <link rel="icon" type="image/png" sizes="4405x3333" href="assets/img/castelancarpinteyro/DanteDEV-Black-Blackground.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/extra.css">
    <link rel="stylesheet" href="assets/css/uiverse.css">
</head>

<body style="background-position: 0 -60px;">
    <!-- Start: Navbar Centered Links -->
    <nav class="navbar navbar-dark navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon rueda-logo"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-code-slash">
                        <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                    </svg></span><span>Castelán Carpinteyro</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="aprende.php">Aprende a programar</a></li>
                    <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="Software.php">Software</a></li>
                </ul>
                <div class="div1-efecto">
                    <div class="dropdown"> <!-- Agregamos una clase "dropdown" al contenedor -->
                        <a class="btn btn-primary shadow div2-efecto dropdown-toggle" role="button" <?php
                                                                                                    if (isset($_SESSION['nombre'])) {
                                                                                                        echo 'href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $_SESSION['nombre'];
                                                                                                    } else {
                                                                                                        echo 'href="login.php">Iniciar sesión';
                                                                                                    }
                                                                                                    ?> </a>
                            <?php if (isset($_SESSION['nombre'])) : ?>
                                <!-- Lista desplegable con opciones para usuarios autenticados -->
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <!--<a class="dropdown-item" href="index.php">Inicio</a>-->
                                    <!--<a class="dropdown-item" href="signin.php">Registrarse</a>-->
                                    <a class="dropdown-item" href="account.php">Mi cuenta</a>
                                    <a class="dropdown-item" href="cursos.php">Mis cursos</a>
                                    <a class="dropdown-item restrict-style" href="php scripts/logout.php">Cerrar sesión</a>
                                    <!-- Agrega más opciones según sea necesario -->
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav><!-- End: Navbar Centered Links -->
    <header class="bg-dark">
        <!-- Start: Hero Clean Reverse -->
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <p class="fw-bold text-success mb-2">Dante Castelán Carpinteyro</p>
                        <h1 class="fw-bold">Programación y servicios web</h1>
                        <p>¡Aprende con nosotros!</p>
                    </div>
                </div>
            </div>
        </div><!-- End: Hero Clean Reverse -->
    </header><!-- Start: Brands -->
    <?php
    #include "php scripts/construirCarruselPrincipal.php";
    include "php scripts/selectorConstructores.php";
    seleccionarConstructor(1);
    ?>
    <!-- Start: Brands -->
    <!--<section class="py-5">
        <div class="container text-center py-5">
            <p class="mb-4" style="font-size: 1.6rem;">Used by <span class="text-success"><strong>2400+</strong></span>&nbsp;of the best companies in the world.</p><a href="#"> <img class="m-3" src="../assets/img/brands/google.png"></a><a href="#"> <img class="m-3" src="../assets/img/brands/microsoft.png"></a><a href="#"> <img class="m-3" src="../assets/img/brands/apple.png"></a><a href="#"> <img class="m-3" src="../assets/img/brands/facebook.png"></a><a href="#"> <img class="m-3" src="../assets/img/brands/twitter.png"></a>
        </div>
    </section><!-- End: Brands -->
    <section>
        <!-- Start: Features Cards -->
        <div class="container bg-dark py-5">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Aprende</p>
                    <h3 class="fw-bold">Visita nuestras secciones destacadas</h3>
                </div>
            </div>
            <div class="py-5 p-lg-5">
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <div class="col mb-5">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-32 0 512 512" width="1em" height="1em" fill="currentColor" class="text-success">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M448 80V128C448 172.2 347.7 208 224 208C100.3 208 0 172.2 0 128V80C0 35.82 100.3 0 224 0C347.7 0 448 35.82 448 80zM393.2 214.7C413.1 207.3 433.1 197.8 448 186.1V288C448 332.2 347.7 368 224 368C100.3 368 0 332.2 0 288V186.1C14.93 197.8 34.02 207.3 54.85 214.7C99.66 230.7 159.5 240 224 240C288.5 240 348.3 230.7 393.2 214.7V214.7zM54.85 374.7C99.66 390.7 159.5 400 224 400C288.5 400 348.3 390.7 393.2 374.7C413.1 367.3 433.1 357.8 448 346.1V432C448 476.2 347.7 512 224 512C100.3 512 0 476.2 0 432V346.1C14.93 357.8 34.02 367.3 54.85 374.7z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Bases de datos</h5>
                                <p class="text-muted card-text mb-4">Diseña, crea, y administra bases de datos para conectarlas a tu sitio.</p><button class="btn btn-primary shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-earmark-code-fill text-success">
                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Maquetado HTML</h5>
                                <p class="text-muted card-text mb-4">Crea el DOM de tus páginas web con etiquetas de HTML5 de forma profesional.</p><button class="btn btn-primary shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor" class="text-success">
                                        <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M480 288H32c-17.62 0-32 14.38-32 32v128c0 17.62 14.38 32 32 32h448c17.62 0 32-14.38 32-32v-128C512 302.4 497.6 288 480 288zM352 408c-13.25 0-24-10.75-24-24s10.75-24 24-24s24 10.75 24 24S365.3 408 352 408zM416 408c-13.25 0-24-10.75-24-24s10.75-24 24-24s24 10.75 24 24S429.3 408 416 408zM480 32H32C14.38 32 0 46.38 0 64v128c0 17.62 14.38 32 32 32h448c17.62 0 32-14.38 32-32V64C512 46.38 497.6 32 480 32zM352 152c-13.25 0-24-10.75-24-24S338.8 104 352 104S376 114.8 376 128S365.3 152 352 152zM416 152c-13.25 0-24-10.75-24-24S402.8 104 416 104S440 114.8 440 128S429.3 152 416 152z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Servidores</h5>
                                <p class="text-muted card-text mb-4">Aquí habrá guías para la administración de servidores; basado en Plesk Obsidian en Ubuntu.</p><button class="btn btn-primary shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope-fill text-success">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title">Correo electrónico</h5>
                                <p class="text-muted card-text mb-4">Integra envíos automáticos y manuales de correos electrónicos en tus páginas y en tu servidor. Configura el webmail.</p><button class="btn btn-primary shadow" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Features Cards -->
    </section>
    <section>
        <!-- Start: Features Cards -->
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
                    <div class="col mb-4">
                        <div class="card bg-primary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-primary card-text mb-2">JavaScript</p>
                                <h5 class="fw-bold card-title mb-3">Prepárate para hacer de tu web un sitio dinámico y con funcionalidades del lado del cliente</h5><button class="btn btn-primary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-secondary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-secondary card-text mb-2">HTML</p>
                                <h5 class="fw-bold card-title mb-3">Crea el maquetado de tu web; aprende sobre metadatos, sé experto en SEO, y construye la base de una página</h5><button class="btn btn-secondary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-info-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-info card-text mb-2">CSS</p>
                                <h5 class="fw-bold card-title mb-3">Dale estilo a tu DOM con hojas de estilo en cascada, usa frameworks como Bootstrap, y deja volar tu creatividad</h5><button class="btn btn-info btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Features Cards -->
    </section><!-- Start: Contact Details -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Contacto</p>
                    <h2 class="fw-bold">Podemos resolver tus dudas</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post">
                            <!-- Start: Success Example -->
                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="name" placeholder="Nombre"></div><!-- End: Success Example -->
                            <!-- Start: Error Example -->
                            <div class="mb-3"><input class="form-control" type="email" id="email-1" name="email" placeholder="Email"></div><!-- End: Error Example -->
                            <div class="mb-3"><textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Mensaje"></textarea></div>
                            <div><button class="btn btn-primary shadow d-block w-100" type="submit">Enviar</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 d-flex justify-content-center justify-content-xl-start">
                    <div class="d-flex flex-wrap flex-md-column justify-content-md-start align-items-md-start h-100">
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Teléfono</h6>
                                <p class="text-muted mb-0">+527979773095</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Email</h6>
                                <p class="text-muted mb-0">contacto@castelancarpinteyro.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-3">
                            <div class="bs-icon-md bs-icon-circle bs-icon-primary shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                    <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h6 class="fw-bold mb-0">Dirección</h6>
                                <p class="text-muted mb-0">12 Example Street</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End: Contact Details -->
    <!-- Start: Newsletter Subscription Color -->
    <section class="py-5">
        <div class="container">
            <div class="bg-dark border rounded border-dark d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5">
                <div class="text-center text-lg-start py-3 py-lg-1">
                    <h2 class="fw-bold mb-2">Suscríbete a nuestro newsletter</h2>
                    <p class="mb-0">Recibe novedades de artículos y guías.</p>
                </div>
                <form class="d-flex justify-content-center flex-wrap flex-lg-nowrap" method="post" action="php scripts/suscripción.php">
                    <div class="my-2"><input class="border rounded-pill shadow-sm form-control" type="email" name="email" placeholder="Correo electrónico"></div>
                    <div class="my-2"><button class="btn btn-primary shadow ms-2" type="submit">Suscríbete</button></div>
                </form>
            </div>
        </div>
    </section><!-- End: Newsletter Subscription Color -->
    <!-- Start: Footer Multi Column -->
    <footer class="bg-dark">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <!-- Start: Services -->
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">Servicios</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Diseño web</a></li>
                        <li><a href="#">Desarrollo backend-frontend</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div><!-- End: Services -->
                <!-- Start: About -->
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 fw-bold">Acerca de</h3>
                    <ul class="list-unstyled">
                        <li><a href="#"><strong>Castelán Carpinteyro</strong></a></li>
                        <li><a href="team.php">Equipo</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div><!-- End: About -->
                <!-- Start: Social Icons -->
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social">
                    <div class="fw-bold d-flex align-items-center mb-2"><span class="bs-icon-sm bs-icon-circle bs-icon-primary d-flex justify-content-center align-items-center bs-icon me-2 rueda-logo"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-code-slash">
                                <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"></path>
                            </svg></span><span>Castelán Carpinteyro</span></div>
                    <p class="text-muted copyright">Castelán Carpinteyro; cursos, guías, tutoriales, y artículos de programación.</p>
                </div><!-- End: Social Icons -->
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 Dante Castelán Carpinteyro</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="https://facebook.com/dantecc10.dev"><svg class="bi bi-facebook" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="https://wa.me/527979773095" target="_blank"><svg class="bi bi-whatsapp" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="https://github.com/dantecc10" target="_blank">
                            <svg class="bi bi-github" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="https://twitter.com/dantecc10" target="_blank"><svg class="bi bi-twitter" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="mailto:contacto@castelancarpinteyro.com" target="_blank"><svg class="bi bi-envelope-fill" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="https://instagram.com/dantecc10fi" target="_blank"><svg class="bi bi-instagram" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </footer><!-- End: Footer Multi Column -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/bold-and-dark.js"></script>
</body>

</html>