@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

    <style>

    </style>

@endsection
@section('main')
    <section>
        <form action="#">
            <div class="container text-left pl-5">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-4"><h1> Amortisman nasıl hesaplanır?</h1></div>
                </div>
                <div class="row">

                    <div class="col-md-3 col-sm-12"><label for="amortisman_yontemi"><b>Amortisman Yönetimi
                                : </b></label></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <select name="a_yontemi" id="a_yontemi" class="form-control select"
                                    onchange="amortismanHesapla();">
                                <option value="1">Normal Amortisman</option>
                                <option value="2">Azalan Bakiyeler</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-12"><label for="a_orani"><b>Amortisman Oranı (%) : </b></label></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input" id="ig">%</span>
                                </div>
                                <input type="text" name="a_orani" id="a_orani" value="12"
                                       onkeypress="return isNumberKey(event)" class="form-control input"
                                       onchange="amortismanHesapla();">
                            </div>


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12"><label for="tutar text-left"><b>Alış Tutarı : </b></label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">

                            @if(false)
                            <div class="slidecontainer">
                                <input type="range" min="1000" max="1000000"  step="1000" class="slider" value="100000" id="tutar_mask" onchange="amortismanHesapla()">

                            </div>
                                @endif



                                <div class="input-group mt-2">

                                    <input type="text" class="form-control input" value="100.000,00" name="tutar_mask" id="tutar_mask"
                                           onkeypress="return isNumberKey(event)" onchange="tutarGoster();">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="ig">TL</span>
                                    </div>

                                </div>



                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12">
                    <input type="hidden" id="tutar"  name="tutar" value="100000"  onchange="amortismanHesapla()">
                    </div>
                    <div class="col-md-3 col-sm-12">

                    </div>
                </div>

            </div>
        </form>

    </section>


    <section>
        <div class="container text-center">
            <div id="result"></div>
        </div>
    </section>

    <section style="margin-top: -100px">

        <div class="container text-left ">
            <div class="row">
                <div class="col-md-12">

                    <h2> Amortisman nasıl hesaplanır?</h2>
                    <p>
                        Vergi Usül Kanunu‘nun (VUK) 315. maddesine göre amortismana tabi olan maddi varlıklar, Maliye
                        Bakanlığı’nın iktisadi kıymetlerin faydalı ömürlerini dikkate alarak tespit ve ilan ettiği
                        oranlar
                        üzerinden hesaplanır.
                    </p>
                    <p>
                        En çok kullanılan amortisman yöntemleri aşağıdakilerdir:
                    </p>
                    <p>
                    <ul>
                        <li>Normal (eşit tutarlı) amortisman yöntemi</li>
                        <li>Azalan bakiyeler (hızlandırılmış amortisman) yöntemi</li>
                        <li>Fevkalade amortisman yöntemi</li>
                    </ul>


                </div>

            </div>

        </div>

    </section>

@endsection

@section('scripts')

    <script src="{{url('assets/js/utils.js')}}"></script>


    <!-- Bootstrap  <script src="{{url('assets/js/Chart.min.js')}}"></script>-->
    <script>
        $(document).ready(function () {

       //     tutarGoster();
            amortismanHesapla();
        });



        function tutarGoster(){
            var t = formatMoney($('#tutar_mask').val());

            $('#tutar_mask').val(t);

            t_dizi = t.split(',');
            var t_new = t_dizi[0].replace('.','');
            if(t_dizi[1]!=null){
              //  t_new+='.'+t_dizi[1];
            }
            //var tutar = parseFloat($('#tutar_mask').val());
            $('#tutar').val(t_new);
            amortismanHesapla();
        }


        function amortismanHesapla() {
            var tutar = $('#tutar').val();


            //   $('#sonuc').html(formatMoney(tutar)+' TL');
           //   var tutar = ($('#tutar_mask').val()).replace(',', '.');
            // t_dizi_1  =  tutar.split('.');
          //  tutar = 10000;
//          t_dizi  =  tutar.split('.');

            //tutar = (t_dizi[1]== null) ? t_dizi[0] : t_dizi[0]+'.'+t_dizi[1];
            // $('#tutar').val(tutar);
            //   tutar = tutar.replace('.','x');


            //  var t1 = $('#tutar').val().split(',');
//            var tutar = (t1[0]).replace('.', '');

            var a_orani = $('#a_orani').val() * 1;
            var a_yontemi = $('#a_yontemi').val() * 1;


            a_orani = (a_orani > 100) ? 100 : a_orani;
            a_orani = (a_orani < 0) ? 12 : a_orani;

            $('#a_orani').val(a_orani);
            $.get("{{url('/muhasebe-vergi/amortisman-inner')}}/" + a_orani + "/" + a_yontemi + "/" + tutar, function (data) {
                $("#result").html(data);
                //alert( "Load was performed." );
            });


        }


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