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
                    <div class="col-md-12 col-sm-12 mb-4"><h1>Mali Tablolar &gt; Bilanço</h1></div>
                </div>


                <div class="row" style="height: 700px">
                    <div class="col-md-3 col-sm-12">

                    </div>
                    <div class="col-md-3 col-sm-12">

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


    <!-- Bootstrap  <script src="{{url('assets/js/Chart.min.js')}}"></script>-->
    <script>
        $(document).ready(function () {


        });


    </script>

@endsection