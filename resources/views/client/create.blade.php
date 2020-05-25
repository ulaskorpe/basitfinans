@extends('main_layout')
@section('title',__('admin.create_client'))
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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{__('admin.create_client')}}</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" id="create-client"
                          action="{{route('client-create-post')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <div class="col-md-8">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('admin.client_name')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="name" value=""
                                           name="name" placeholder="{{__('admin.client_name')}}">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>


                                    <div id="name_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('admin.client_title')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="title" value=""
                                           name="title" placeholder="{{__('admin.client_title')}}">
                                    <span class="fa fa-asterisk form-control-feedback left" aria-hidden="true"></span>


                                    <div id="title_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.email')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="email" name="email"
                                           placeholder="{{__('general.email')}}">
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                    <div id="email_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.phone')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="phone" name="phone"
                                           placeholder="{{__('general.phone')}}">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    <div id="phone_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.website')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="website"
                                           name="website"
                                           placeholder="{{__('general.website')}}">
                                    <span class="fa fa-signal form-control-feedback left" aria-hidden="true"></span>
                                    <div id="website_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.address')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="address"
                                           name="address"
                                           placeholder="{{__('general.address')}}">
                                    <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                    <div id="address_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.description')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea name="description" id="decription" class="form-control" cols="30"
                                              rows="10" placeholder="{{__('general.description')}}"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 form-group">
                                <label class="control-label col-md-2 col-sm-2 ">{{__('general.logo')}}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" class="form-control has-feedback-left" id="logo" name="logo"
                                           onchange="showImage('logo','target','avatar_img')"
                                           placeholder="{{__('general.logo')}}">
                                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                                    <div id="avatar_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12">

                                <img id="target" width="120" style="display: none;margin-left: 100px">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-9 col-offset-12">

                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">{{__('general.submit')}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="min-height: 500px"></div>
@endsection

@section('scripts')
    <script src="{{url('vendors/switchery/dist/switchery.min.js')}}"></script>



    <!-- Custom Theme Scripts -->


    <script>


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

        $('#create-client').submit(function (e) {
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
                $('#website_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
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
                    $.get("{{url('/email-exists-client')}}/" + $('#email').val(), function (data) {
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
                url: '{{route('client-create-post')}}',
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
                            window.open('{{url('/clients')}}', '_self');
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