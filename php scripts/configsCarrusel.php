<?php
//Variables
$baseClaseDinámicaCSS = "banner-carrusel-";
$comilla = '"';

//Supercontenedor 1 (carousel items): estático
$apSupCont1 = '<section class="py-5"><!-- Start: Carousel Hero --><div class="carousel slide" data-bs-ride="carousel" id="carousel-1"><div class="carousel-inner">';
$ciSupCont1 = '</div>';

//Supercontenedor 2 (carousel indexes): estático
$apSupCont2 = '<div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div><ol class="carousel-indicators">';
$ciSupCont2 = '</ol></div><!-- End: Carousel Hero --></section><!-- End: Brands -->';

//Contenedor 1 (carousel item): dinámico
$apCont1["a"] = ['<div class="carousel-item"><div class="bg-light border rounded border-light ', '<div class="carousel-item active"><div class="bg-light border rounded border-light '];
$apCont1_1 = ' carousel-hero jumbotron py-7 px-4">';
$ciCont1 = '</div></div>';

//Contenedor 2 (carousel index): dinámico
$apCont2 = '<li data-bs-target="#carousel-1" data-bs-slide-to="';
$ciCont2["b"] = [($comilla . '></li>'), ($comilla . ' class="active"></li>')];

//Subcontenedor 1: Título
$apSubCont1 = '<h1 class="hero-title">';
$ciSubCont1 = '</h1>';

//Subcontenedor 2: Descripción
$apSubCont2 = '<p class="hero-subtitle">';
$ciSubCont2 = '</p>';

//Contenedores CSS
$apStyleCSS = "<style>";
$ciStyleCSS = "</style>";

//Subcontenedor 3: Link
$apSubCont3 = ('<p><a class="btn btn-primary btn-lg hero-button" role="button" href=' . $comilla);
$ciSubCont3 = ($comilla . '>Conocer más</a></p>');
