@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')

    <section>

        <div class="container text-left pl-5">
            <div class="row">
                <div class="col-md-12">

                    <h1> Amortisman nasıl hesaplanır?</h1>
                    <p>
                    Vergi Usül Kanunu‘nun (VUK) 315. maddesine göre amortismana tabi olan maddi varlıklar, Maliye
                    Bakanlığı’nın iktisadi kıymetlerin faydalı ömürlerini dikkate alarak tespit ve ilan ettiği oranlar
                    üzerinden hesaplanır.
                    </p><p>
                    En çok kullanılan amortisman yöntemleri aşağıdakilerdir:
                    </p><p>
                        <ul>
                        <li>Normal (eşit tutarlı) amortisman yöntemi</li>
                        <li>Azalan bakiyeler (hızlandırılmış amortisman) yöntemi</li>
                        <li>Fevkalade amortisman yöntemi</li>
                        </ul>
                    </p>

                </div>

            </div>

        </div>

    </section>
    <section>
        <form action="#">
            <div class="container text-left pl-5">
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

                            <select name="a_orani" id="a_orani" class="form-control w-50 select"
                                    onchange="amortismanHesapla();">
                                @for($i=0;$i<100;$i++)
                                    <option value="<?=$i?>" @if($i==12) selected @endif>%<?=$i?></option>
                                @endfor

                            </select>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12"><label for="tutar text-left"><b>Amortisman Tutarı : </b></label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">

                            <div class="input-group mt-2">

                                <input type="number" class="form-control input" value="100000" name="tutar" id="tutar"
                                       min="0.00" max="10000.00" step="100" onchange="amortismanHesapla();">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="ig">TL</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-12"><label for="tutar text-left"><b>Yıl Sayısı : </b></label></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">

                            <div class="input-group mt-2">
                                <div id="yil_sayisi"></div>
                            </div>
                        </div>
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

@endsection

@section('scripts')
    <script src="{{url('assets/js/Chart.min.js')}}"></script>
    <script src="{{url('assets/js/utils.js')}}"></script>

    <!-- Bootstrap -->
    <script>
        $(document).ready(function () {
            // console.log( "ready!" );

            amortismanHesapla();
        });


        function amortismanHesapla() {

            var a_orani = $('#a_orani').val() * 1;
            var a_yontemi = $('#a_yontemi').val() * 1;
            var tutar = $('#tutar').val() * 1;


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