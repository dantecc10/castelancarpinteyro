<?php
function definirParámetrosCarrusel()
{   
    //Supercontenedor 1 (carousel items): estático
    $apSupCont1 = '<section class="py-5"><!-- Start: Carousel Hero --><div class="carousel slide" data-bs-ride="carousel" id="carousel-3"><div class="carousel-inner">';
    $ciSupCont1 = '</div><!-- End: Carousel Hero --></section><!-- End: Brands -->';

    //Supercontenedor 2 (carousel items): estático
    $apSupCont1 = '<div><a class="carousel-control-prev" href="#carousel-3" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-3" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div><ol class="carousel-indicators">';
    $ciSupCont1 = '</ol>';

    //Contenedor 1 (carousel item): dinámico
    $apCon1 = '';
    $ciCon1 = '';

    //Contenedor 2 (carousel item): dinámico
    $apCon2 = '';
    $ciCon2 = '';


    $dante = ('<div class="carousel-item">
    <div class="bg-light border rounded border-light hero-photography carousel-hero jumbotron py-5 px-4">
        <h1 class="hero-title"></h1>
        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
            dapibus ac facilisis in, egestas eget quam.</p>
        <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p>
    </div>
</div>');

    return 
}
