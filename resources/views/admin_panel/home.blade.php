@extends('main_layout')
@section('title', 'giriş sayfası')
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    {{Auth::id()}}

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}!!!
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection

@section('css')
    <style>


        .table{
            width: 100%;
        }
    </style>

@endsection
