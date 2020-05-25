@extends('main_layout')
@section('title',__('admin.client_update'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')
    <!-- Bootstrap -->

    <!-- Datatables -->

    <!-- Custom Theme Style -->
    <link href="{{url('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="row">

        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> {{__('admin.client_update')}} </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                <li role="presentation" @if($active==1)class="active" @endif><a href="#tab_content1" role="tab"
                                                                          id="info-tab" data-toggle="tab"
                                                                          aria-expanded="true">{{__('admin.client_info')}}</a>
                                </li>

                                <li role="presentation" @if($active==2)class="active" @endif><a href="#tab_content2" id="executives-tab" role="tab"
                                                                    data-toggle="tab"
                                                                    aria-expanded="false">{{__('admin.client_executives')}}</a>
                                </li>

                                <li role="presentation" @if($active==3)class="active" @endif><a href="#tab_content3" role="tab" id="orders-tab"
                                                                    data-toggle="tab"
                                                                    aria-expanded="false">{{__('admin.client_orders')}}</a>
                                </li>
                                <li role="presentation" @if($active==4)class="active" @endif><a href="#tab_content4" role="tab" id="settings-tab"
                                                                    data-toggle="tab"
                                                                    aria-expanded="false">{{__('admin.client_settings')}}</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade @if($active==1)  active in @endif" id="tab_content1" aria-labelledby="info-tab">
                                    @include("client.client_info")
                                </div>

                                <div role="tabpanel" class="tab-pane fade  @if($active==2)  active in @endif" id="tab_content2" aria-labelledby="executives-tab">
                                    @include("client.client_executives")
                                </div>
                                <div role="tabpanel" class="tab-pane fade  @if($active==3)  active in @endif" id="tab_content3" aria-labelledby="orders-tab">
                                   @include("client.client_orders")
                                </div>
                                <div role="tabpanel" class="tab-pane fade  @if($active==4)  active in @endif" id="tab_content4" aria-labelledby="settings-tab">
                                   @include("client.client_settings")
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="clearfix"></div>


        </div>


    </div>

    <div class="row" style="min-height: 500px"></div>
@endsection

@section('scripts')
    <script src="{{url('vendors/switchery/dist/switchery.min.js')}}"></script>



    <!-- Custom Theme Scripts -->


    <script>

        function deleteExecutive(id) {


            swal({
                title: "{{__('admin.executive_will_be_deleted')}}",
                text: "",

                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.get('/clients/executive/delete/' + id, function (data) {

                        var parsed = JSON.parse(data);
                        var arr = [];
                        for (var x in parsed) {
                            arr.push(parsed[x]);
                        }

                        swal("{{__('general.congrats')}}", arr[0], "success");

                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    });

        }
        });




        }////fx




        function is_url(str) {
            regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
            if (regexp.test(str)) {
                return true;
            }
            else {
                return false;
            }
        }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        $(document).ready(function () {

            $('#client_menu').click();

            $.get("{{url('/get-pic')}}", function (data) {
                if (data) {
                    $('.profile_pic').html(data);
                }

            });
        });


        function showImage(img, target, hide_it) {
            $('#' + hide_it).hide();
            $('#' + img).show();

            var src = document.getElementById(img);
            var target = document.getElementById(target);
            var val = $('#' + img).val();
            var arr = val.split('\\');
            $.get("{{url('/check_image')}}/" + arr[arr.length - 1], function (data) {
                ///swal(data);
                if (data === 'ok') {
                    $('#avatar_error').html('');
                    $('#target').show();
                    var fr = new FileReader();
                    fr.onload = function (e) {

                        var image = new Image();
                        image.src = e.target.result;

                        image.onload = function (e) {
                            // access image size here

                            //  swal(this.width+"x"+this.height);

                            //  $('#imgresizepreview, #profilepicturepreview').attr('src', this.src);
                        };


                        target.src = this.result;
                    };
                    fr.readAsDataURL(src.files[0]);
                } else {
                    $('#avatar_error').html('<span style="color: red">{{__('errors.wrong_format')}}</span>');
                    //swal("admin.image_wrong_format");
                    $('#' + img).val('');
                    $('#' + target).hide();
                    $('#' + img).focus();

                }
            });
        }


        function validatePhone(phone) {
            return (phone.length < 10) ? false : true;

        }

        $('#update-client').submit(function (e) {
            e.preventDefault();
            var error = false;
            eps = 0;
            if ($('#name').val() == '') {
                $('#name_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
                error = true;
            } else {
                $('#name').html('');
            }
            if ($('#title').val() == '') {
                $('#title_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
                error = true;
            } else {
                $('#title_error').html('');
            }


            if ($('#website').val() != '') {

                if (!is_url($('#website').val())) {

                    $('#website_error').html('<span style="color: red">{{__('errors.not_valid_url')}}</span>');
                    $('#website').val('')
                    error = true;
                } else {
                    $('#website_error').html('');
                }

            } else {
                $('#phone_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
                error = true;
            }

            if ($('#phone').val() != '') {

                if (!validatePhone($('#phone').val())) {

                    $('#phone_error').html('<span style="color: red">{{__('errors.not_valid_phone')}}</span>');
                    $('#phone').val('')
                    error = true;
                } else {
                    $('#phone_error').html('');
                }

            } else {
                $('#phone_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
                error = true;
            }


            if ($('#email').val() == '') {
                $('#email_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
            } else {
                if (!validateEmail($('#email').val())) {
                    $('#email').val('');
                    $('#email_error').html('<span style="color: red">{{__('errors.not_valid_email')}}</span>');
                    error = true;
                } else {
                    $.get("{{url('/email-exists-client')}}/" + $('#email').val()+'/{{$client['id']}}', function (data) {
                        if (data == 1) {
                            $('#email_error').html('<span style="color: red">{{__('errors.email_exists')}}</span>');
                            error = true;
                        } else {
                            $('#email_error').html('');
                        }
                    });
                }
            }


            if (error) {
                return false;
            }
            var formData = new FormData(this);
            save(formData);
        });

        function save(formData) {
            $.ajax({
                type: 'POST',
                url: '{{route('client-update-post')}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    var parsed = JSON.parse(data);
                    var arr = [];
                    for (var x in parsed) {
                        arr.push(parsed[x]);
                    }
                    if (arr[1] > 0) {
                        swal("{{__('general.congrats')}}", arr[0], "success");
                        setTimeout(function () {
                            location.reload();
                           // window.open('{{url('/clients')}}', '_self');
                        }, 1000);

                    } else {
                        swal("{{__('general.error')}}", arr[0], "error");

                    }
                },
                error: function (data) {
                    if (data.status === 422) {
                        var errors = data.responseJSON.errors;
                        var message = "";
                        $.each(errors, function (key, value) {
                            message += key + ' : ' + value;
                        });

                        swal("HATA!", message, "error");

                    }
                    //{"msg":"Yaz\u0131 Eklendi","id":19}
                    if (data.status === 500) {
                        swal("HATA!", 'Hata oluþtu', "error");

                    }
                }
            });
        }
    </script>
    <!-- Custom Theme Scripts -->

@endsection