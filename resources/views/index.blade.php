@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')

<section>

    <div style="width:100%;">
        <canvas id="canvas"></canvas>
    </div>
    <br>
    <br>



</section>
    <?php if(false){?>
<button id="randomizeData">Randomize Data</button>
<button id="addDataset">Add Dataset</button>
<button id="removeDataset">Remove Dataset</button>
<button id="addData">Add Data</button>
<button id="removeData">Remove Data</button>
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
    <script src="{{url('assets/js/Chart.min.js')}}"></script>
    <script src="{{url('assets/js/utils.js')}}"></script>

    <!-- Bootstrap -->
    <script>
        $( document ).ready(function() {
          //  swal("ok");
        });

        var MONTHS = ['Ocak', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                labels: ['Ocak', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Kırmızı',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [ 15,25,355,21,213,21
                    /*    randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()*/
                    ],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'cxc'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
             //swal("ok");

            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };


        /*
        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[config.data.datasets.length % colorNames.length];
            var newColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                backgroundColor: newColor,
                borderColor: newColor,
                data: [],
                fill: false
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        document.getElementById('addData').addEventListener('click', function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                config.data.datasets.forEach(function(dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        document.getElementById('removeData').addEventListener('click', function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
        */
    </script>

@endsection