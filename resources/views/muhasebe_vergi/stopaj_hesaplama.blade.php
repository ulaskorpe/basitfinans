@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')

    <section class="container">

        <div class="row text-justify">
            <div class="col-md-12">
                <h1>Stopaj Nedir?</h1>
                <hr>
                <p>
                    Stopaj aslen bir vergi ödeme şekli olup, işverenlerce gelir ya da kurumlar vergisine tabi olan bir
                    kazanca ait tutarın, iş yapana ödenmesi sırasında, yasa ile belirlenmiş oranlarca bu tutarın bir
                    kısmının korunarak, iş yapan adına peşin olarak vergi dairesine yatırılması şeklinde gerçekleşen
                    vergileme şeklidir.
                </p>
                <p>
                    Stopaj, Maliye İdaresi’nin vergi tahsilini daha garanti ve kolay bir şekilde gerçekleştirmek
                    istemesinden doğan bir yöntem olarak biliniyor. Uygulama yöntemi göz önünde bulundurulduğunda, temin
                    edilmesi en güvenilir ve en işlek yöntem olarak belirtiliyor. Stopaj, gelir meydana gelir gelmez,
                    devlet
                    tarafından gelirin kaynağından tahsil ediliyor.
                </p>
                <p>
                    Stopaj vergisinin amacı ise; vergilerin tahsilinin daha kolay ve garantili biçimde yapılması… Bu
                    sayede,
                    küçük matrahların vergiden kaçırılması önleniyor, maliye idaresinin ve vergi mükellefinin işlem
                    yükünü
                    azalıyor. Bir diğer amacı da; verginin, gelirin oluşmasından çok kısa bir süre sonra maliye
                    dairesine
                    geçmesine destek olmak ve nihayet verginin mükellef üzerinde oluşan psikolojik etkisini gidermek
                    olarak
                    belirtiliyor.
                </p>
                <h2>Stopaj Ne Zaman Ödenir?</h2>
                <p>Stopaj vergisi, Gelir İdaresi Başkanlığı’nca her yılın başında belirtilen vergi takvimine göre iki
                    eşit taksit olarak ödenebiliyor. Gelir kapsamında bulunan kira stopaj hesaplamaları her sene mart
                    ayında beyan ediliyor. Gelir vergisi kapsamındaki kira stopaj vergisi her yılın Mart ve Temmuz
                    aylarında ödeniyor.</p>
                <h2>Stopaj Nasıl Hesaplanır?</h2>
                <p>Stopaj vergisi oranları, Gelir ve Kurumlar Vergisi kanunlarında maddeler halinde belirtiliyor. Bu
                    kanunlarda kimlerin hangi koşullarda stopaj vergisi ödemesi gerektiği açıkça belirtiliyor. Stopaj
                    kesintisinin brüt ücret üzerinden hesaplandığını da belirtelim.</p>
                <p>2000 TL bedelindeki brüt kira fiyatının %20’si olarak hesaplanan 400 TL, kiracı tarafından stopaj
                    kesintisi olarak vergi idaresine, geriye kalan 1600 TL’lik bedel ise net kira bedeli olarak mülk
                    sahibine ödeniyor.</p>
                <p>Kira sözleşmesinde kira bedeli, brüt olarak değil de net olarak beyan edildiyse aşağıdaki formül uygulanıyor.</p>
                <p>Brütleştirme Formülü = Net Kira Ücreti / (1-0,2)</p>
                <p>Net olarak belirtilen kira bedelinden dolayı yeni stopaj tutarı ise;</p>
                <p>Brüt Kira Bedeli = 2000 / 0,8 = 2500 TL</p>
                <p>Stopaj Tutarı = 2500 x 0,2 = 500 TL</p>
            </div>
        </div>


    </section>
    <section class="container">
        <div class="row text-justify">
            <div class="col-md-12">
                <h2>Hesaplama</h2>
                <hr>
            </div>
        </div>
        <div class="row">


            <div class="col-md-3 col-sm-12">
                <div class="form-group text-left">
                    <label for="s_orani">Stopaj Oranı</label>
                    <div class="input-group mt-2">
                    <select name="s_orani" id="s_orani" class="form-control w-50 select" onchange="stopajHesapla();">
                        @for($i=0;$i<100;$i++)
                            <option value="<?=$i?>" @if($i==20) selected @endif>%<?=$i?></option>
                            @endfor

                    </select>
                    </div>

                </div>


        </div>
            <div class="col-md-3 col-sm-12">
                <div class="form-group text-left">
                    <label for="kdv_orani">KDV Oranı</label>
                    <div class="input-group mt-2">
                    <select name="kdv_orani" id="kdv_orani" class="form-control w-50  select"  onchange="stopajHesapla();">
                        @for($i=0;$i<100;$i++)
                            <option value="<?=$i?>" @if($i==18) selected @endif>%<?=$i?></option>
                        @endfor

                    </select>
                    </div>

                </div>
            </div>

            <div class="col-md-5 col-sm-12">
                <div class="form-group text-left">
                    <label for="brut">Brüt Kira</label>
                    <div class="input-group mt-2">

                        <input type="number" class="form-control input" value="1000" name="brut" id="brut" onchange="stopajHesapla();">
                        <div class="input-group-append">
                            <span class="input-group-text" id="ig">TL</span>
                        </div>

                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 mr-5">
                 <div class="row ">


            <div class="col-md-12 col-sm-12  ml-3">

            <div  class="row bg-primary text-white"><div class="col-md-11">Brüt Ücret Üzerinden Hesaplama</div></div>
            <div class="row">
                <div class="col-md-6 text-left">Brüt Ücret:</div><div class="col-md-6 text-right" id="brut_ucret"></div>
                <div class="col-md-6 text-left">Stopaj Oranı:</div><div class="col-md-6 text-right" id="stopaj_orani"></div>
                <div class="col-md-8 text-left">Gelir Vergisi Stopajı:</div><div class="col-md-4 text-right" id="gv_stopaji"></div>
                <div class="col-md-6 text-left">Net Ücret:</div><div class="col-md-6 text-right" id="net_ucret"></div>
                <div class="col-md-6 text-left">KDV Oranı:</div><div class="col-md-6 text-right" id="kdv_orani_1"></div>
                <div class="col-md-6 text-left">KDV Tutarı:</div><div class="col-md-6 text-right" id="kdv_tutari"></div>
                <div class="col-md-6 text-left">Tahsil Edilen:</div><div class="col-md-6 text-right" id="tahsil_edilen"></div>


            </div>



            </div>

        </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
            <div class="col-md-12 col-sm-12  ml-3">
                <div  class="row bg-secondary text-white"><div class="col-md-11">Net Ücret Üzerinden Hesaplama</div></div>
                <div class="row">
                <div class="col-md-6 text-left">Brüt Ücret:</div><div class="col-md-6 text-right" id="brut_ucret_1"></div>
                <div class="col-md-6 text-left">Stopaj Oranı:</div><div class="col-md-6 text-right" id="stopaj_orani_1"></div>
                <div class="col-md-8 text-left">Gelir Vergisi Stopajı:</div><div class="col-md-4 text-right" id="gv_stopaji_1"></div>
                <div class="col-md-6 text-left">Net Ücret:</div><div class="col-md-6 text-right" id="net_ucret_1"></div>
                <div class="col-md-6 text-left">KDV Oranı:</div><div class="col-md-6 text-right" id="kdv_orani_2"></div>
                <div class="col-md-6 text-left">KDV Tutarı:</div><div class="col-md-6 text-right" id="kdv_tutari_1"></div>
                <div class="col-md-6 text-left">Tahsil Edilen:</div><div class="col-md-6 text-right" id="tahsil_edilen_1"></div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-5 col-sm-12 mr-5">
                <div class="row ">


                    <div class="col-md-12 col-sm-12  ml-3">

                        <div  class="row bg-success text-white"><div class="col-md-11">Tahsil Edilenden Hesaplama</div></div>
                        <div class="row">
                            <div class="col-md-6 text-left">Brüt Ücret:</div><div class="col-md-6 text-right" id="brut_ucret_2"></div>
                            <div class="col-md-6 text-left">Stopaj Oranı:</div><div class="col-md-6 text-right" id="stopaj_orani_2"></div>
                            <div class="col-md-8 text-left">Gelir Vergisi Stopajı:</div><div class="col-md-4 text-right" id="gv_stopaji_2"></div>
                            <div class="col-md-6 text-left">Net Ücret:</div><div class="col-md-6 text-right" id="net_ucret_2"></div>
                            <div class="col-md-6 text-left">KDV Oranı:</div><div class="col-md-6 text-right" id="kdv_orani_3"></div>
                            <div class="col-md-6 text-left">KDV Tutarı:</div><div class="col-md-6 text-right" id="kdv_tutari_tahsil">dd</div>
                            <div class="col-md-6 text-left">Tahsil Edilen:</div><div class="col-md-6 text-right" id="tahsil_edilen_2"></div>


                        </div>



                    </div>

                </div>
            </div>
            <div class="col-md-5 col-sm-12">

            </div>
        </div>
    </section>

    <section>&nbsp;</section>

@endsection

@section('scripts')
    <script src="{{url('assets/js/Chart.min.js')}}"></script>
    <script src="{{url('assets/js/utils.js')}}"></script>

    <!-- Bootstrap -->
    <script>
        $(document).ready(function () {
            stopajHesapla();
        });


        function stopajHesapla(){


            if($('#brut').val() == ''){
                swal("Lütfen brüt tutarı giriniz");
                $('#brut').focus();

                return ;
            }

            var s_orani = $('#s_orani').val();
            if(isNaN(s_orani)){
                $('#s_orani').val(1000);
                stopajHesapla();
            }else{
                if(parseInt(s_orani)<0){
                    alert("ok");
                    $('#s_orani').val(1000);
                    stopajHesapla();
                }
            }
            var kdv = $('#kdv_orani').val();

            var brut = $('#brut').val();
            brut = brut *1 ;
            $('#brut_ucret').html(brut.toFixed(2)+' TL');
            $('#stopaj_orani').html('%'+s_orani);
            $('#gv_stopaji').html((s_orani*brut/100).toFixed(2) + ' TL');
            $('#net_ucret').html((brut -  (s_orani*brut/100)).toFixed(2) + ' TL');
            $('#kdv_orani_1').html('%'+kdv);
            $('#kdv_tutari').html((brut*kdv/100).toFixed(2) + ' TL');
            $('#tahsil_edilen').html(((brut*kdv/100)+ (brut -  (s_orani*brut/100))).toFixed(2) + ' TL');

            var brut_1 = brut/ (1-(s_orani/100));
            brut_1= brut_1.toFixed(2);

            $('#brut_ucret_1').html(  brut_1 + ' TL');
            $('#stopaj_orani_1').html('%'+s_orani);
            $('#gv_stopaji_1').html((brut_1 * s_orani /100).toFixed(2) + ' TL');
            $('#net_ucret_1').html( brut.toFixed(2)  + ' TL');
            $('#kdv_orani_2').html('%'+kdv);
            var kdv_tutari_1 = (brut_1*kdv/100)*1;
            $('#kdv_tutari_1').html(kdv_tutari_1.toFixed(2)+ ' TL');
            $('#tahsil_edilen_1').html((kdv_tutari_1+brut).toFixed(2) + ' TL');


//B33/(-(B28-B31-1))
            var tahsil_edilen = brut*1;
             var brut_3 = (tahsil_edilen/ ( 1-((s_orani/100)-(kdv/100)).toFixed(2))).toFixed(2);
             var gv = (brut_3 * s_orani / 100).toFixed(2);
            $('#brut_ucret_2').html( brut_3 +' TL');
            $('#stopaj_orani_2').html('%'+s_orani);
            $('#gv_stopaji_2').html(  gv + ' TL');
            $('#net_ucret_2').html((brut_3-gv).toFixed(2) + ' TL');
            $('#kdv_orani_3').html('%'+kdv);
            $('#kdv_tutari_tahsil').html((brut_3*kdv/100).toFixed(2)+' TL');
            $('#tahsil_edilen_2').html(tahsil_edilen.toFixed(2) + ' TL');


        }

        var MONTHS = ['Ocak', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                labels: ['Ocak', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Kırmızı',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [15, 25, 355, 21, 213, 21
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
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function () {
            //swal("ok");

//            var ctx = document.getElementById('canvas').getContext('2d');
            //   window.myLine = new Chart(ctx, config);
        };


        // var colorNames = Object.keys(window.chartColors);

    </script>

@endsection