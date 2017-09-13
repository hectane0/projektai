{% extends 'layouts/landing.volt' %}

{% block content %}
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">ASI<sup>2</sup> QUIZ</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#page-top">O aplikacji</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">Motywacje</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Prezentacja</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Autorzy</a>
                        </li>
                        <li>
                            {{ link_to(["for": "register"], "Rejestracja") }}
                        </li>
                        <li>
                            <a class="page-scroll cpointer" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">Najlepszy sposób na przeprowadzenie quizu online</h1>
                    <hr>
                    <p>ASI<sup>2</sup> to aplikacja pozwalająca na szybkie i łatwe tworzenie oraz przeprowadzanie quizów z niezwykle ważnych przedmiotów: Aplikacji internetowych oraz systemów wzpomagania decyzji!</p>
                    <a href="#about" class="btn btn-primary btn-xl page-scroll">Więcej</a>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Nasze motywacje</h2>
                        <hr class="light">
                        <p class="text-faded">Aplikacje internetoww/Sztuczna inteligencja QUIZ<br>(W skróce AISI, w jeszcze większym skrócie ASI<sup>2</sup>) to jedynie prosta aplikacja powstała z&nbsp;konieczności zaliczenia przedmiotu. Jednak jeśli chcesz wybróbować jej ograniczone możliwości to zapraszamy!</p>
                        <a class="page-scroll btn btn-default btn-xl sr-button cpointer" data-toggle="modal" data-target="#loginModal">Zaloguj!</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Tylko u nas</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-question text-primary sr-icons"></i>
                            <h3>Własne pytania</h3>
                            <p class="text-muted">Możliwość tworzenia własnych pytań bez ograniczeń.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-user text-primary sr-icons"></i>
                            <h3>Dla wszystkich</h3>
                            <p class="text-muted">Wszystko co musisz zrobić to zarejestrować się.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-money text-primary sr-icons"></i>
                            <h3>Całkowicie za darmo</h3>
                            <p class="text-muted">Żadnych opłat i ukrytych kosztów.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-bluetooth-b text-primary sr-icons"></i>
                            <h3>Bluetooth</h3>
                            <p class="text-muted">Bluetooth nie ma z tym nic wspólnego, ale ikona fajna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-padding" id="portfolio">
            <div class="container-fluid">
                <div class="row no-gutter popup-gallery">
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                            <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Po co marnować papier?
                                    </div>
                                    <div class="project-name">
                                        Ekolodzy będą Ci wdzięczni
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                            <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Lorem
                                    </div>
                                    <div class="project-name">
                                        Ipsum
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                            <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Lorem
                                    </div>
                                    <div class="project-name">
                                        Ipsum
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <aside class="bg-dark">
            <div class="container text-center">
                <div class="call-to-action">
                    <h2>Nie masz jeszcze konta?</h2>
                    {{ link_to(["for": "register"], "Załóż je teraz", "class": "btn btn-default btn-xl sr-button") }}
                </div>
            </div>
        </aside>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Autorzy</h2>
                        <hr class="primary">

                    </div>
                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <p><i class="fa fa-book fa-3x sr-contact"></i></p>
                        <div>Patryk Wieczorek</div>
                        <div>122310</div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <p><i class="fa fa-book fa-3x sr-contact"></i></p>
                        <div>Paulina Grela</div>
                        <div>122329</div>
                    </div>
                </div>
            </div>
        </section>

    {{ partial('partials/loginModal') }}
{% endblock %}