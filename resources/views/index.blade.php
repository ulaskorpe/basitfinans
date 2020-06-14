@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')

    <section>

        <div style="  width: 100%;height: auto">
            <div id="slider3" class="carousel slide carousel-fade w-75" style="margin: 0px auto;">
                <ol class="carousel-indicators">
                    <li data-target="#slider3" data-slide-to="0" class="active"></li>
                    <li data-target="#slider3" data-slide-to="1"></li>
                    <li data-target="#slider3" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/slider-1.jpeg" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lorem ipsum dolor sit.</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda deserunt
                                doloremque eligendi impedit incidunt iure laudantium libero maiores minima, modi nam
                                numquam odio optio quidem quod reiciendis ullam ut!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slider-2.jpeg" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Slider Header 1</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, eaque!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/slider-3.jpeg" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Slider Header 1</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, eaque!</p>
                        </div>
                    </div>
                </div>
                <a href="#slider3" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#slider3" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>


        </div>
        <br>
        <br>
.row>p>ul>li*5
{{----}}
    </section>

@endsection

@section('scripts')

    <!-- Bootstrap -->
    <script>
        $(document).ready(function () {
            //  swal("ok");
        });


    </script>

@endsection