@extends('main_layout')
@section('title',__('admin.client_list'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')
    <!-- Bootstrap -->

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
@endsection
@section('main')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{__('admin.client_list')}}</h2>
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" onclick="window.open('{{route('client-create')}}','_self')">{{__('admin.add_client')}}</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th>{{__('general.logo')}}</th>
                            <th>{{__('admin.client_name')}}</th>
                            <th>{{__('general.contact')}}</th>
                            <th>{{__('general.created_at')}}</th>
                            <th>#</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td> @if($client['logo'])

                                        <img src="{{makeCommonFileUrl($client['logo'],64,64,1)}}" alt="" id="avatar_img">
                                    @else
                                        <img src="" alt="" id="avatar_img" style="display: none">
                                    @endif</td>
                                <td>{{$client['name']}}</td>
                                <td>{{$client['email']}}
                                    @if($client['phone'])
                                        - {{$client['phone']}}
                                    @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($client['created_at'])->format('d.m.Y')}}</td>
                                <td><button type="button" class="btn btn-primary" onclick="window.open('{{route('client-update',$client['id'])}}','_self')">{{__('general.update')}}</button></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>

    <div class="row" style="min-height: 500px"></div>
@endsection

@section('scripts')

    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>



    <!-- Custom Theme Scripts -->

    <script>
        $(document).ready(function () {

            $.get("{{url('/get-pic')}}", function (data) {
                if (data) {
                    $('.profile_pic').html(data);
                }

            });
        });




    </script>
    <!-- Custom Theme Scripts -->

@endsection