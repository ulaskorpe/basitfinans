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
                    <div class="col-md-12 col-sm-12 mb-4"><h1>Mali Tablolar &gt; Nakit Akışı</h1></div>
                </div>
                <div class="row">

                    <div class="col-md-3 col-sm-12"><label for=""><b>Yıl Seçiniz
                                : </b></label></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <select name="yil" id="yil" class="form-control select"
                                    onchange="hesapla();">

                                @for($i = 1990;$i<date('Y')+10 ; $i++)
                                    <option value="{{$i}}" @if($i==date('Y')) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3 col-sm-12"><label for="amortisman_yontemi"><b>Devir Nakit Banka: </b></label>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <div class="input-group mt-2">

                                <input type="text" class="form-control input" value="0,00" name="tutar_mask"
                                       id="tutar_mask"
                                       onkeypress="return isNumberKey(event)" onchange="tutarGoster();">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="ig">TL</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3" ><div class="col-md-6 col-sm-12">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Tabloyu Kaydet</button>
                    </div></div>
                <div class="row" >



                    <input type="hidden" id="tutar" class="form-control" style="height: 30px" name="tutar" value="0"
                           onchange="hesapla()">


                    <div class="col-md-12 col-sm-12">

                           <div id="nakit_akisi_inner"></div>


                    </div>
                </div>

            </div>
        </form>

    </section>


    <section>
        <div class="container text-center">

        </div>
    </section>



@endsection

@section('scripts')

    <script src="{{url('assets/js/utils.js')}}"></script>



    <script>
        $(document).ready(function () {
            hesapla();
        });



        function monthNames(){
            $('#label_yil').html($('#yil').val());
        }
        function hesapla() {


            $.get( "{{route('nakit-akisi-inner')}}", function( data ) {
                $( "#nakit_akisi_inner" ).html( data );

            });
        }


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
            hesapla();
        }


        function altKalemForm(ust_id,id){
            $('#modal_title').html('Nakit Akış Alt Kalemi Ekle');
            if(id){
            $.get( "{{url('muhasebe-vergi/mali-tablolar/alt-kalem')}}/"+ust_id+"/"+id, function( data ) {
                $('#modal_body').html(data);
            });

            }else{
                $.get( "{{url('muhasebe-vergi/mali-tablolar/alt-kalem')}}/"+ust_id, function( data ) {
                    $('#modal_body').html(data);
                });
            }

        }


        function nakitAkisKalemiEkle(type){
            $('#modal_title').html('Nakit Akış Üst Kalemi Ekle');

            $.get( "{{url('muhasebe-vergi/mali-tablolar/nakit-akis-ust-kalem')}}/"+type+"/"+$('#yil').val(), function( data ) {
                $('#modal_body').html(data);
            });

        }


        function nakitAkisKalemiGuncelle(type,id){
            $('#modal_title').html('Nakit Akış Üst Kalemi Güncelle');

            $.get( "{{url('muhasebe-vergi/mali-tablolar/nakit-akis-ust-kalem')}}/"+type+"/"+$('#yil').val()+'/'+id, function( data ) {
                $('#modal_body').html(data);
            });
        }
    </script>

@endsection