@if(false)
    <div class="bg-secondary" id="navbar_logo">
        <div class="container">
            <a class="navbar-brand pad" href="/"><img src="{{url('img/logo.png')}}" alt=""
                                                      class="img-thumbnail mx-auto d-inline" style="max-width: 50px">
                <h1 class="d-inline ml-2">Basit Finans</h1></a>
        </div>


    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-10" id="main_navbar">

        <div class="container text-center pr-12">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-75  " id="navbarSupportedContent">
                <ul class="navbar-nav " style=" margin: 0px auto">

                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Kredi / Mevzuat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <b>Kredi Hesaplama</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <li><a class="dropdown-item" href="#">Eþit Taksitli Kredi</a></li>
                                    <li><a class="dropdown-item" href="#">Spot Kredi</a></li>
                                    <li><a class="dropdown-item" href="#">Balon Ödemeli</a></li>
                                    <li><a class="dropdown-item" href="#">Rotatif Kredi</a></li>
                                </ul>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" id="navbarDropdown2" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="false" aria-expanded="false">
                                    <b>Mevduat Faizi</b>
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
                            <li><a class="dropdown-item" href="#"><b>Kur Endeksleri</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Eflasyon</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Döviz Çevirici</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Paranýn Bugünkü Deðeri</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Kira Artýþý Hesaplama</b></a></li>


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
                                    <b>Mali Tablolar</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                    <li><a class="dropdown-item" href="{{route('gelir-tablosu')}}">Gelixxxr Tablosu</a></li>
                                    <li><a class="dropdown-item" href="{{route('bilanco')}}">Bilanço</a></li>
                                    <li><a class="dropdown-item" href="{{route('nakit-akisi')}}">Nakit Akýþý</a></li>
                                </ul>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <b>Vergi</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                    <li><a class="dropdown-item" href="#">Kira Gelir Vergisi</a></li>
                                    <li><a class="dropdown-item" href="{{route('stopaj-hesaplama')}}">Stopaj
                                            Hesaplama</a></li>
                                    <li><a class="dropdown-item" href="#">Tapu Harcý Hesaplama</a></li>
                                </ul>
                            </li>

                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{route('amortisman')}}"><b>Amortisman</b></a>

                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown6" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <b>Mevzuat</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown6">
                                    <li><a class="dropdown-item" href="#">KDV Kanunu</a></li>
                                    <li><a class="dropdown-item" href="#">Vergi Usul Kanunu</a></li>
                                    <li><a class="dropdown-item" href="#">Ýþ Kanunu</a></li>
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
                                    <b>Banka Talimatý</b>
                                </a>

                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <b>Personel</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                    <li><a class="dropdown-item" href="#">Ýzin formu</a></li>
                                    <li><a class="dropdown-item" href="#">Balon Ödemeli</a></li>
                                    <li><a class="dropdown-item" href="#">Rotatif Kredi</a></li>
                                    <li><a class="dropdown-item" href="#">Ýþ Sözleþmesi</a></li>
                                    <li><a class="dropdown-item" href="#">Ýzin Formu</a></li>
                                    <li><a class="dropdown-item" href="#">Avans Formu</a></li>
                                </ul>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Maaþ / Tazminat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="false" aria-expanded="false">
                                    <b>Maaþ Hesaplama</b>
                                </a>

                            </li>
                            <div class="dropdown-divider"></div>

                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="false" aria-expanded="false">
                                    <b>Kýdem Tazminatý</b>
                                </a>

                            </li>
                            <div class="dropdown-divider"></div>

                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="false" aria-expanded="false">
                                    <b>Ýhbar Tazminatý</b>
                                </a>

                            </li>
                            <div class="dropdown-divider"></div>

                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" id="navbarDropdown3" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="false" aria-expanded="false">
                                    <b>Ýþsizlik Maaþý Hesaplama</b>
                                </a>

                            </li>


                        </ul>
                    </li>


                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Kullanýcý Giriþi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><b>Üye Giriþi</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Yeni Kayýt</b></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#"><b>Þifremi Unuttum</b></a></li>


                        </ul>
                    </li>

                    <li class="nav-item active dropdown">

                        <form class="  ">


                            <div class="input-group ">

                                <input class="form-control" type="search" placeholder="Arama" aria-label="Arama">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
                                                class="fas fa-search"></i></button>
                                </div>

                            </div>


                        </form>
                    </li>
                    <!--
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    -->


                </ul>

            </div>


        </div>

    </nav>
@endif