<!--
<nav>
    <div class="container clearfix">
        <div id="logo-box">
            <a href="/" class="logo text-uppercase">
                Basit Finans
            </a>
        </div>

        <div id="nav-links" class="responsive">
            <ul>

                <li class="nav-item">
                    <a href="#" class="nav-link text-uppercase nav-icon">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-uppercase">
                        Portfolio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-uppercase">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-uppercase">
                        Contact
                    </a>
                </li>
            </ul>
        </div>



    </div>
</nav>
 -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-10" id="main_navbar">

    <a class="navbar-brand pad" href="/"><img src="{{url('img/logo.png')}}" alt="" class="img-thumbnail mx-auto d-inline" style="max-width: 64px"><h1 class="d-inline ml-2">Basit Finans</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mr-12" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Kredi / Mevzuat
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <b>Kredi Hesaplama</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="#">Eşit Taksitli Kredi</a></li>
                            <li><a class="dropdown-item" href="#">Spot Kredi</a></li>
                            <li><a class="dropdown-item" href="#">Balon Ödemeli</a></li>
                            <li><a class="dropdown-item" href="#">Rotatif Kredi</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>Mevduat Faizi</b>
                        </a>

                    </li>



                </ul>
            </li>


            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Enflasyon / Kur
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"><b>Kur Endeksleri</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Eflasyon</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Döviz Çevirici</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Paranın Bugünkü Değeri</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Kira Artışı Hesaplama</b></a></li>



                </ul>
            </li>


            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                   Muhasebe / Vergi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <b>Mali Tablolar</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <li><a class="dropdown-item" href="#">Gelir Tablosu</a></li>
                            <li><a class="dropdown-item" href="#">Bilanço</a></li>
                            <li><a class="dropdown-item" href="#">Nakit Akışı</a></li>
                        </ul>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <b>Vergi</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <li><a class="dropdown-item" href="#">Kira Gelir Vergisi</a></li>
                            <li><a class="dropdown-item" href="{{route('stopaj-hesaplama')}}">Stopaj Hesaplama</a></li>
                            <li><a class="dropdown-item" href="#">Tapu Harcı Hesaplama</a></li>
                        </ul>
                    </li>

                    <div class="dropdown-divider"></div>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="{{route('amortisman')}}"><b>Amortisman</b></a>

                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown6" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <b>Mevzuat</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown6">
                            <li><a class="dropdown-item" href="#">KDV Kanunu</a></li>
                            <li><a class="dropdown-item" href="#">Vergi Usul Kanunu</a></li>
                            <li><a class="dropdown-item" href="#">İŞ Kanunu</a></li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Pratik Formlar
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>Banka Talimatı</b>
                        </a>

                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <b>Personel</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <li><a class="dropdown-item" href="#">İzin formu</a></li>
                            <li><a class="dropdown-item" href="#">Balon Ödemeli</a></li>
                            <li><a class="dropdown-item" href="#">Rotatif Kredi</a></li>
                            <li><a class="dropdown-item" href="#">İş Sözleşmesi</a></li>
                            <li><a class="dropdown-item" href="#">İzin Formu</a></li>
                            <li><a class="dropdown-item" href="#">Avans Formu</a></li>
                        </ul>
                    </li>



                </ul>
            </li>


            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Maaş / Tazminat
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>Maaş Hesaplama</b>
                        </a>

                    </li>
                    <div class="dropdown-divider"></div>

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>Kıdem Tazminatı</b>
                        </a>

                    </li>
                    <div class="dropdown-divider"></div>

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>İhbar Tazminatı</b>
                        </a>

                    </li>
                    <div class="dropdown-divider"></div>

                    <li class="nav-item dropdown">
                        <a class="dropdown-item" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown"
                           aria-haspopup="false" aria-expanded="false">
                            <b>İşsizlik Maaşı Hesaplama</b>
                        </a>

                    </li>



                </ul>
            </li>


            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Kullanıcı Girişi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#"><b>Üye Girişi</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Yeni Kayıt</b></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a class="dropdown-item" href="#"><b>Şifremi Unuttum</b></a></li>



                </ul>
            </li>
            <!--
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            -->



        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Arama" aria-label="Arama">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

</nav>