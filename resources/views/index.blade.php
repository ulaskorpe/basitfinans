@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')

<section class="header"></section>
    <?php if(false){?>

    <header class="header">
        <!--
        <div class="container">
            <img id="profile-image" class="img-fluid" src="img/timthumb.jpg" alt="">
            <h1 class="text-uppercase"> </h1>
            <hr class="star-light">
            <h2>

            </h2>
        </div>
        -->
    </header>

    <section id="portfolio">
        <div class="container">
            <h2 class="text-uppercase">
                Portfolio
            </h2>
            <hr class="star-dark">

            <div id="portfolio-images" class="clearfix">

                <div class="col">
                    <div class="portfolio-item">
                        <a href="#">
                            <img class="img-fluid" src="img/cabin.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col">
                    <div class="portfolio-item">

                        <a href="#">
                            <img class="img-fluid" src="img/cake.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col">
                    <div class="portfolio-item">

                        <a href="#">
                            <img class="img-fluid" src="img/circus.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col">
                    <div class="portfolio-item">

                        <a href="#">
                            <img class="img-fluid" src="img/game.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col">
                    <div class="portfolio-item">

                        <a href="#">
                            <img class="img-fluid" src="img/safe.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col">
                    <div class="portfolio-item">

                        <a href="#">
                            <img class="img-fluid" src="img/submarine.png" alt="">

                            <div class="img-overlay">
                                <div class="icon">
                                    <i class="fas fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section id="about">
        <h2 class="text-uppercase">About</h2>

        <hr class="star-light">

        <div id="about-text" class="clearfix">

            <div class="left">
                <p class="text">
                    Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source
                    files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.
                </p>
            </div>
            <div class="right">
                <p class="text">
                    Whether you're a student looking to showcase your work, a professional looking to attract clients, or a
                    graphic artist looking to share your projects, this template is the perfect starting point!
                </p>
            </div>

        </div>

        <button class="btn btn-outline btn-large">
            <i class="fas fa-download"></i>
            Download Now!
        </button>
    </section>

    <section id="contact">

        <div class="container">

            <h2 class="text-uppercase">
                Contact Me
            </h2>
            <hr class="star-dark">


            <form id="contact-form">

                <div class="form-group">
                    <input type="text" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" id="email" placeholder="Email Address">
                </div>

                <div class="form-group">
                    <input type="text" id="phone" placeholder="Phone">
                </div>

                <div class="form-group">
                    <textarea id="message" rows="5" placeholder="Message"></textarea>
                </div>

                <div>
                    <button class="btn btn-primary">
                        Send
                    </button>
                </div>

            </form>
        </div>
    </section>
    <?php }?>
@endsection

@section('scripts')
    <!-- Bootstrap -->


@endsection