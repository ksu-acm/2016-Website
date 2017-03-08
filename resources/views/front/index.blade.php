@extends('layouts.front')
@section('title', 'Home')

@section('content')
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="brand-hover navbar-brand page-scroll" href="#page-top">K-State ACM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav-hover nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#about">Meet Us</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">ACM SIG</a>
                </li>
                <li>
                    <a class="page-scroll" href="#portfolio">Events</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/apps') }}">Dashboard</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">K-State Association for Computing Machinery</h1>
                <hr class="purple-hr">
                <p>The Association for Computing Machinery is the professional organization for computer scientists. We strive to bring the computer science
                community closer by hosting a variety of events as well as getting involved in the community.</p>
                <a href="#about" class="btn-purple btn-hover btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">The People</h2>
                    <hr class="light">
                    <p class="text-faded">Get to know the Officers and Junior Officers that make all of the ACM events possible.</p>
                    <a href="{{ url('/officers' )}}" class="btn-purple btn-hover page-scroll btn btn-default btn-xl sr-button">Meet us!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Special Interest Groups</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-users text-primary sr-icons"></i>
                        <h3>ACM-W</h3>
                        <p class="text-muted">ACM-W supports, celebrates, and advocates internationally for the full engagement of women in all aspects of the computing field.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-database text-primary sr-icons"></i>
                        <h3>ACM-SIGAI</h3>
                        <p class="text-muted">We work with Machine Learning, Autonomous Robots, Data Science, Game AI and other related branches of AI.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-code-fork text-primary sr-icons"></i>
                        <h3>Mobile Dev Club</h3>
                        <p class="text-muted">Students develop software for mobile devices such as tablets and phones.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-code text-primary sr-icons"></i>
                        <h3>Game Dev Club</h3>
                        <p class="text-muted">Club members work in teams to develop computer games. We also hosts game jams annually.

</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/1.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Community Involvment
                                </div>
                                <div class="project-name">
                                    Stem Nights
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/2.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Student Involvment
                                </div>
                                <div class="project-name">
                                    Programming Competitions
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/3.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Student Involvment
                                </div>
                                <div class="project-name">
                                    LAN Parties
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/4.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Student Involvment
                                </div>
                                <div class="project-name">
                                    Help Sessions
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/5.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Student Involvment
                                </div>
                                <div class="project-name">
                                    Tech Talks
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ asset( 'img/portfolio/thumbnails/6.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Industry Involvment
                                </div>
                                <div class="project-name">
                                    Industry Series
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
                <h2>Check out upcoming events!</h2>
                <a href="https://orgsync.com/86744/chapter" class="btn-purple btn-hover btn btn-default btn-xl sr-button">Orgsync</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to get involved? Have an event idea you'd like to see? That's great! Send us an email and we will get back to you as soon as possible!</p>
                </div>

                <div class="col-lg-4 col-lg-offset-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a class="email-link" href="mailto:ksuacm@ksu.edu">ksuacm@ksu.edu</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')

@endsection
