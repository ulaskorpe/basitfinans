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

//////////////////////

 -->


<section style="padding-top: 0px" class="bg-light">


        <div class="row w-100 pt-2"  >
        <div class="col-lg-2 col-md-12 bg-light d-flex justify-content-center  pt-2 pl-5">
            <a class="navbar-brand" href="/"><img src="{{url('img/logo.png')}}" alt=""
                                                  class="img-thumbnail mx-auto d-inline" style="max-width: 50px">
                <h3 class="d-inline ml-2 text-secondary">Basit Finans</h3></a>
        </div>
        <div class="col-lg-10 col-md-12 d-flex justify-content-stretch   pl-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 "  id="main_navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto" style=" margin: 0px auto">
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Kredi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Kredi Hesaplama
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                        <li><a class="dropdown-item" href="#">Eşit Taksitli Kredi</a></li>
                                        <li><a class="dropdown-item" href="#">Spot Kredi</a></li>
                                    </ul>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown2" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        Mevduat Faizi
                                    </a>

                                </li>


                            </ul>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Enflasyon / Kur
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Kur Endeksleri </a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Eflasyon</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Döviz Çevirici</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Paranın Bugünkü Değeri</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Kira Artışı Hesaplama</a></li>


                            </ul>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Muhasebe / Vergi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Mali Tablolar
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                        <li><a class="dropdown-item" href="{{route('gelir-tablosu')}}">Gelir Tablosu</a></li>
                                        <li><a class="dropdown-item" href="{{route('bilanco')}}">Bilanço</a></li>
                                        <li><a class="dropdown-item" href="{{route('nakit-akisi')}}">Nakit Akışı</a></li>
                                    </ul>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Vergi
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                        <li><a class="dropdown-item" href="#">Kira Gelir Vergisi</a></li>
                                        <li><a class="dropdown-item" href="{{route('stopaj-hesaplama')}}">Stopaj
                                                Hesaplama</a></li>
                                        <li><a class="dropdown-item" href="#">Tapu Harcı Hesaplama</a></li>
                                    </ul>
                                </li>

                                <div class="dropdown-divider"></div>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{route('amortisman')}}">Amortisman</a>

                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown6" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Mevzuat
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown6">
                                        <li><a class="dropdown-item" href="#">KDV Kanunu</a></li>
                                        <li><a class="dropdown-item" href="#">Vergi Usul Kanunu</a></li>
                                        <li><a class="dropdown-item" href="#">İş Kanunu</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Pratik Formlar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        Banka Talimatı
                                    </a>

                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        Personel
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                        <li><a class="dropdown-item" href="#">İzin formu</a></li>
                                        <li><a class="dropdown-item" href="#">İş Sözleşmesi</a></li>
                                        <li><a class="dropdown-item" href="#">İzin Formu</a></li>
                                        <li><a class="dropdown-item" href="#">Avans Formu</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Maaş / Tazminat
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        Maaş Hesaplama
                                    </a>

                                </li>
                                <div class="dropdown-divider"></div>

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        Kıdem Tazminatı
                                    </a>

                                </li>
                                <div class="dropdown-divider"></div>

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        İhbar Tazminatı
                                    </a>

                                </li>
                                <div class="dropdown-divider"></div>

                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="false" aria-expanded="false">
                                        İşsizlik Maaşı Hesaplama
                                    </a>

                                </li>


                            </ul>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                Kullanıcı Girişi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Üye Girişi</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Yeni Kayıt</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="#">Şifremi Unuttum</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active  d-flex justify-content-center">
                            <form class="form-inline my-2 my-md-0">
                                <div class="bs-example">
                                    <div class="input-group mt-0">

                                        <input type="text" class="form-control typeahead" autocomplete="off" spellcheck="false" id="search_find">
                                        <div class="input-group-append" style="height: 30px">
                                            <button class="btn btn-outline-success"  type="button" onclick="getRoute($('#search_find').val())"><i
                                                        class="fas fa-search"></i></button>
                                        </div>

                                    </div>


                                </div>

                            </form>
                        </li>
                    </ul>


                </div>

            </nav>
        </div>
        </div>


</section>