<?php
//Supercontenedor 1 (carousel items): estático
$apSupCont1 = '<section class="py-5"><!-- Start: Carousel Hero --><div class="carousel slide" data-bs-ride="carousel" id="carousel-1"><div class="carousel-inner">';
$ciSupCont1 = '</div>';

//Supercontenedor 2 (carousel indexes): estático
$apSupCont1 = '<div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div><ol class="carousel-indicators">';
$ciSupCont1 = '</ol></div><!-- End: Carousel Hero --></section><!-- End: Brands -->';

//Contenedor 1 (carousel item): dinámico
$apCont1[] = ['<div class="carousel-item"><div class="bg-light border rounded border-light hero-nature carousel-hero jumbotron py-5 px-4">', '<div class="carousel-item active"><div class="bg-light border rounded border-light hero-nature carousel-hero jumbotron py-5 px-4">'];
$ciCont1 = '</div></div>';

//Contenedor 2 (carousel index): dinámico
$apCont2 = '<li data-bs-target="#carousel-1" data-bs-slide-to="';
$ciCont2[] = ['"></li>', '" class="active"></li>'];

//Subcontenedor 1: Título
$apSubCont1 = '<h1 class="hero-title">';
$ciSubCont1 = '</h1>';

//Subcontenedor 2: Descripción
$apSubCont2 = '<p class="hero-subtitle">';
$ciSubCont2 = '</p>';

//Subcontenedor 3: Link
$apSubCont = '<p><a class="btn btn-primary btn-lg hero-button" role="button" href="';
$ciSubCont = '">Conocer más</a></p>';

//Subcontenedor 4
$apSubCont;
$ciSubCont;


//Contenedor 2 (carousel item): dinámico
$apCont2 = '';
$ciCont2 = '';


$dante = ('<div class="carousel-item">
    <div class="bg-light border rounded border-light hero-photography carousel-hero jumbotron py-5 px-4">
        <h1 class="hero-title"></h1>
        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
            dapibus ac facilisis in, egestas eget quam.</p>
        <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p>
    </div>
</div>');