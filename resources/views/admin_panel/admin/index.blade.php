@extends('admin_panel.main_layout')
@section('title',__('general.admin_list'))
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
                    <h2>{{__('general.admin_list')}}</h2>
                    <div class="pull-right">
                    <button type="button" class="btn btn-success" onclick="window.open('{{route('admin-create')}}','_self')">{{__('general.add_admin')}}</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th>{{__('general.image')}}</th>
                            <th>{{__('general.name_surname')}}</th>
                            <th>{{__('general.contact')}}</th>
                            <th>{{__('general.created_at')}}</th>
                            <th>#</th>
                        </tr>
                        </thead>


                      <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td> @if($admin['avatar'])

                                        <img src="{{makeCommonFileUrl($admin['avatar'],64,64,1)}}" alt="" id="avatar_img">
                                    @else
                                        <img src="" alt="" id="avatar_img" style="display: none">
                                    @endif</td>
                                <td>{{$admin['name_surname']}}</td>
                                <td>{{$admin['email']}}
                                        @if($admin['phone'])
                                            - {{$admin['phone']}}
                                            @endif
                                </td>
                                <td>{{\Carbon\Carbon::parse($admin['created_at'])->format('d.m.Y')}}</td>
                                <td><button type="button" class="btn btn-primary" onclick="window.open('{{route('admin-update',$admin['id'])}}','_self')">{{__('general.update')}}</button></td>

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

            $.get("{{url('admin-panel/get-pic')}}", function (data) {
                if (data) {
                    $('.profile_pic').html(data);
                }

            });
        });




    </script>
    <!-- Custom Theme Scripts -->

@endsection