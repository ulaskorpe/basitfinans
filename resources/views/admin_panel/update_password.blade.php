@extends('admin_panel.main_layout')
@section('title',__('general.update_password'))
@section('metaDescription', 'sayfa description')
@section('metaKeywords', 'anahtar kelimeler ')
@section('css')

@endsection
@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{__('general.update_password')}}</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="update-password"
                          action="{{route('update-password-post')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{__('general.password')}}</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" class="form-control has-feedback-left" id="password"
                                       name="password" placeholder="{{__('general.password')}}">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                <div id="password_error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">{{__('general.password_again')}}</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" class="form-control has-feedback-left" id="password_again" name="password_again"
                                       placeholder="{{__('general.password_again')}}">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                <div id="password_again_error"></div>
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



        function validatePw(pw) {
            return (pw.length < 6) ? false : true;

        }




        $('#update-password').submit(function (e) {
            e.preventDefault();

            var error = false;


            if ($('#password').val() != '') {
                if (!validatePw($('#password').val())) {
                    $('#password_error').html('<span style="color: red">{{__('errors.short_password')}}</span>');
                    $('#password').val('')
                    error = true;
                } else {
                    $('#password_error').html('');
                }

            } else {
                $('#password_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');

            }


            if ($('#password_again').val() == '') {
                error = true;
                $('#password_again_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
            } else {
                if ($('#password_again').val() !=$('#password').val() ) {
                    $('#password_again').val('');
                    $('#password_again_error').html('<span style="color: red">{{__('errors.pw_not_match')}}</span>');
                    error = true;
                } else {
                    $('#password_again_error').html('');
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
                url: '{{route('update-password-post')}}',
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