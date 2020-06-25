@extends('front_layout')
@section('title',__('general.basit_finans'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap-slider.css')}}">

@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap-slider.css')}}">

@endsection
@section('main')

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


<div class="row" style="height: 50px; ">


</div>



<div id="ozet_div" style="width: 100%; "></div>
<div id="sonuc" style="width: 100%; "></div>

@endsection

@section('scripts')

<script type="text/javascript" src="https://paymu.com.tr/assets/bootstrap-slider.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
     //   hesapla();
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

@endsection