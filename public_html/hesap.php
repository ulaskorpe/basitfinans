<!DOCTYPE html>
<html>
<head>
    <title>HESAP MAKİNESİ</title>


    <link rel="stylesheet" href="https://paymu.com.tr/assets/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://paymu.com.tr/assets/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://paymu.com.tr/assets/bootstrap-slider.css">
    <!-- Latest compiled and minified JavaScript -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        .slider-handle {
            background-image: -webkit-linear-gradient(top, #00c4b3 0%, #00c4b3 100%) !important;
        }

        .titt {

            height: 22px;
            font-family: Arial;
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #000000;
        }
        #taksit_div {
            position: relative;
            top: 10px;

            font-family: Arial;
            font-size: 30px;
            font-weight: 300;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            margin-bottom: 20px;
            color: #000000;
        }

        .header2 {

            height: 50px;
            background-color: #00c4b3;
            font-family: Arial;
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #ffffff;

        }

        .sc{
            height: 80px;
        }
        .gr{


            border: solid 0px #979797;
            background-color: #fcfcfc;
        }

        .wh{


            border: solid 0px #979797;
            background-color: #ffffff;
        }

        .tx1{

            font-family: Arial;
            font-size: 16px;
            font-weight: 600;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #919191;
        }
        .mobil-tr{
            display:none;


        }

        .web-tr{
            display:  ;
        }

        @media screen and (max-width: 768px) {

            .mobil-tr{
                display: inline-table  ;text-align: center;
            }
            .web-tr{
                display: none ;
            }



        }
    </style>
</head>
<body>


<div class="row">
    <div class="col-md-10" style="height: 100px;">



    </div>
</div>



<div class="row" style="height: 100px; >
	<div class="col-md-1"></div>


<div class="col-md-4">
    <label class="titt">Finansman Tutarı</label><br><br>
    <input id="anapara" style="width: 100%" name="anapara" data-slider-id='anaparaSlider' type="text" data-slider-min="1000" data-slider-max="30000" data-slider-step="500" data-slider-value="5000" onchange="hesapla();">
</div>

<div class="col-md-4">

    <label class="titt">Taksit Sayısı:</label>  &nbsp;&nbsp;
    <br><br>

    <input id="taksit_sayisi" name="taksit_sayisi"  style="width: 100%;"  data-slider-id='ex1Slider' type="text" data-slider-min="2" data-slider-max="60" onchange="hesapla();" data-slider-step="1" data-slider-value="36"/>

    <!--
		<select name="taksit_sayisi" id="taksit_sayisi" class="form-control">
					<?php for($i=36;$i>0;$i-=2){?>
						<option value="<?=$i?>"><?=$i?> </option>
					<?php }?>

				</select>
			-->
</div>
<div class="col-md-2"><label class="titt">Taksit Tutarı</label> :<span id="taksit_div"></span></div>
<div class="col-md-2">



</div>
<div class="col-md-1" ></div>

</div>
<div class="row" style="height: 50px; ">


</div>



<div id="ozet_div" style="width: 100%; "></div>
<div id="sonuc" style="width: 100%; "></div>


</body>


<script type="text/javascript" src="https://paymu.com.tr/assets/jquery-3.4.1.js"></script>
<script src="https://paymu.com.tr/assets/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://paymu.com.tr/assets/sweetalert.min.js"></script>
<script type="text/javascript" src="https://paymu.com.tr/assets/bootstrap-slider.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        hesapla();
    });

    /*[includeme file="https://paymu.com.tr/hesap_makinesi.php"]*/
    function isInteger(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


    function faizBul(taksit_sayisi){

        if(taksit_sayisi <6 ){
            return $("#faiz3").val();
        }else if(taksit_sayisi >= 6 && taksit_sayisi <12 ){
            return $("#faiz4").val();
        }else if(taksit_sayisi >= 12 && taksit_sayisi <18 ){
            return $("#faiz5").val();
        }else if(taksit_sayisi >= 18 && taksit_sayisi <24 ){
            return $("#faiz6").val();
        }else if(taksit_sayisi >= 24 ) {
            return $("#faiz7").val();
        }else{
            return $("#faiz3").val();
        }



    }


    function taksit_bul(taksit_sayisi,anapara){
        var faiz = faizBul(taksit_sayisi);

        $.get( "https://paymu.com.tr/taksit_bul.php?faiz="+faiz+'&taksit_sayisi='+taksit_sayisi+'&anapara='+anapara, function( data ) {
            $( "#taksit_div" ).html( data );

        });
    }

    function ozet_bul(taksit_sayisi,anapara){
        var faiz = faizBul(taksit_sayisi);
        $.get( "https://paymu.com.tr/ozet_bul.php?faiz="+faiz+'&taksit_sayisi='+taksit_sayisi+'&anapara='+anapara, function( data ) {
            $( "#ozet_div" ).html( data );

        });
    }



    function hesapla(){

        var taksit_sayisi = $('#taksit_sayisi').val();
        var anapara = $('#anapara').val();
        var faiz = faizBul(taksit_sayisi);


        //console.log(taksit_sayisi+" : "+faiz);

        if(taksit_sayisi==''){
            swal('ay sayısı giriniz');
            $('#taksit_sayisi').focus();
            return false;
        }

        if(anapara==''){
            swal('anapara giriniz');
            $('#anapara').focus();
            return false;
        }else if( $('#anapara').val()< 1000 || $('#anapara').val() > 30000 ){
            swal('anapara tutarı 1000 - 30000 arasında olmalıdır');
            $('#anapara').val(0);
            $('#anapara').focus();
            return false;

        }

        taksit_bul(taksit_sayisi,anapara);
        ozet_bul(taksit_sayisi,anapara);


        $.get( "https://paymu.com.tr/hm_sonuc.php?faiz="+faiz+'&taksit_sayisi='+taksit_sayisi+'&anapara='+anapara, function( data ) {
            $( "#sonuc" ).html( data );

        });

        //$('#sonuc').html($('#faiz').val() );
    }

    $("#taksit_sayisi").slider({
        tooltip: 'always'
    });
    $("#anapara").slider({
        tooltip: 'always',

    });


</script>

</html>

<?php


?>