<?php
include_once('header.php');
?>
<link rel="stylesheet" type="text/css" href="/css/world/cssmap-continents.css" media="screen" />

<h1 class="text-center logo mt-3 text-muted">World Database <i class="fas fa-globe-americas"></i></h1>
<div id="map-continents" class="my-5">
    <ul class="continents">
        <li class="c1"><a href="/continent/Africa">Afrique</a></li>
        <li class="c2"><a href="/continent/Asia">Asie</a></li>
        <li class="c3"><a href="/continent/Oceania">Océanie</a></li>
        <li class="c4"><a href="/continent/Europe">Europe</a></li>
        <li class="c5"><a href="/continent/North%20America">Amérique du nord</a></li>
        <li class="c6"><a href="/continent/South%20America">Amérique du sud</a></li>
    </ul>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card border-0 shadow" style="width: 18rem;">
                <img src="https://img-19.ccm2.net/AKc7Axxb5V35l75DKJj1OB85-WA=/5582b751b31a41da8896e43bab3b75e6/ccm-faq/NZRUD7aV-istock-000022571971small.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Europe</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/Europe" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card border-0 shadow" style="width: 18rem;">
                <img src="https://img-4.linternaute.com/fhwZf2QIh4MgxB_ha8qvDYsqApU=/1240x/smart/e6d5ba1b0dc44685a2e8f02bf1d8ec01/ccmcms-linternaute/10214259-les-plus-belles-plages-d-asie.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Asie</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/Asia" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card  border-0 shadow" style="width: 18rem;">
                <img src="https://photo.speedresa.com/photos_to/763/212652881.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Afrique</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/Africa" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card  border-0 shadow" style="width: 18rem;">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZlsHoGpZROTWoYIa0sjKG5LRxHBlKaErjMvtFYRAK-ALkvKDb" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Amérique du Nord</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/North%20America" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card border-0 shadow" style="width: 18rem;">
                <img src="http://www.ameriquedusud.org/wp-content/uploads/2013/03/montagne-du-machupicchu.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Amérique du sud</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/South%20America" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5">
            <div class="card border-0 shadow" style="width: 18rem;">
                <img src="https://img.aws.la-croix.com/2015/05/01/1308233/Pour-iles-Pacifique-tres-menacees-rechauffement-climatique-urgence_0_730_400.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'Océanie</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/Oceania" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-center mx-auto mt-5 mb-5">
            <div class="card border-0 shadow" style="width: 18rem;">
                <img src="https://medias.croisieres-exception.fr/media/cache/ship_diaporama/var/images/502018/5c126eea1a5b7-3.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">L'antartique</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/continent/Antarctica" class="btn btn-primary">Afficher les pays</a>
                </div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cssmapsplugin.com/5/jquery.cssmap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // CSSMap;
        $("#map-continents").CSSMap({
            "size": 1450,
            "mapStyle": "default"
        });
        // END OF THE CSSMap;

    });
</script>