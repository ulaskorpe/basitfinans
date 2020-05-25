@extends('admin_panel.main_layout')
@section('title',__('general.profile'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')



<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{__('general.my_info')}}</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="update-admin"
                          action="{{route('profile-post')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{__('general.name_surname')}}
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="name_surname" value="{{$admin['name_surname']}}"
                                       name="name_surname" placeholder="{{__('general.name_surname')}}">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                <div id="name_error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{__('general.email')}}</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="email" name="email" value="{{$admin['email']}}"
                                       placeholder="{{__('general.email')}}">
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                <div id="email_error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.phone')}}</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="phone" name="phone" value="{{$admin['phone']}}"
                                       placeholder="{{__('general.phone')}}">
                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                <div id="phone_error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">{{__('general.image')}}</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" class="form-control has-feedback-left" id="avatar" name="avatar" onchange="showImage('avatar','target','avatar_img')"
                                       placeholder="{{__('general.image')}}">
                                <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                                <div id="image_error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @if($admin['avatar']!='')


                                    <img src="{{makeCommonFileUrl($admin['avatar'],64,64,1)}}" alt="" id="avatar_img"
                                         style="margin-top: 0px">
                                    <img id="target" width="120" style="display: none;">
                                @else
                                    <img id="target" width="120" style="display: none;">
                                    <img id="avatar_img" width="120" style="display: none;">
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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

    <script>

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }


        function validatePhone(phone) {
            return (phone.length < 10) ? false : true;

        }


        function showImage(img, target, hide_it) {
            $('#' + hide_it).hide();
            $('#' + img).show();

            var src = document.getElementById(img);
            var target = document.getElementById(target);
            var val = $('#' + img).val();
            var arr = val.split('\\');
            $.get("{{url('admin-panel/check_image')}}/" + arr[arr.length - 1], function (data) {
                ///swal(data);
                if (data === 'ok') {

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

        $('#update-admin').submit(function (e) {
            e.preventDefault();

            var error = false;
            if ($('#name_surname').val() == '') {
                $('#name_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
                error = true;
            } else {
                $('#name_error').html('');
            }

            if ($('#phone').val() != '') {

                if (!validatePhone($('#phone').val())) {
                    // swal("{{__('admin.please_fill')}} {{__('admin.admin_name')}}");
                    $('#phone_error').html('<span style="color: red">{{__('errors.not_valid_phone')}}</span>');
                    $('#phone').val('')
                    error = true;
                } else {
                    $('#phone_error').html('');
                }

            } else {
                $('#phone_error').html('');
            }


            if ($('#email').val() == '') {
                error = true;
                $('#email_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
            } else {
                if (!validateEmail($('#email').val())) {
                    $('#email').val('');
                    $('#email_error').html('<span style="color: red">{{__('errors.not_valid_email')}}</span>');
                    error = true;
                } else {
                    $('#email_error').html('');
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
                url: '{{route('profile-post')}}',
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

                    swal("tebrikler", arr[0], "success");
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
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
                        swal("HATA!", 'Hata oluştu', "error");

                    }
                }
            });
        }


        $(document).ready(function () {
            //      swal("ok");

            //   $('#home_menu').click();
            $.get("{{url('admin-panel/get-pic')}}", function (data) {
                if (data) {
                    $('.profile_pic').html(data);
                }

            });
        });

    </script>
    <!-- Custom Theme Scripts -->

@endsection