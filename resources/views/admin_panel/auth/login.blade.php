<!DOCTYPE html>
<html lang="tr">
@include("admin_panel.partials.head");
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">





                <form class="form" id="login-form" name="login-form" action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}



                    <h1>{{__('auth.login_form')}} {{Session::get('lang')}}</h1>
                    <div class="form-group">

                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"  autofocus>
                        <span id="email_error" style="height: 30px">&nbsp;</span>
                    </div>

                    <div>
                        <input id="password" type="password" class="form-control" name="password" >
                        <span id="password_error" style="height: 30px">&nbsp;</span>
                    </div>
                    <div>


                        <button type="submit"
                                class="btn btn-default submit" >{{__('auth.login')}}</button>
                        <a href="#signup" class="to_register"> {{__('auth.forget_password')}}</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-money"></i> BasitFinans</h1>
                            <p></p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form class="form" id="password-form" name="login-form" action="#" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <h1>{{__('auth.forget_password')}}</h1>
                    <div>
                        <input type="text" class="form-control" id="pw_email" name="pw_email" placeholder="{{__('general.email')}}" />
                        <span id="pw_email_error" style="height: 30px">&nbsp;</span>
                    </div>

                    <div>
                        <button type="submit"
                                class="btn btn-default submit" >{{__('auth.send_password')}}</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">
                            <a href="#signin" class="to_register"> {{__('auth.login')}} </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-money"></i> BasitFinans</h1>
                            <p></p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script src="{{url('assets/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    $('#login-form').submit(function (e) {
        e.preventDefault();
        var error = false;

        if ($('#email').val() == '' )   {
            $('#email_error').html('<span style="color: red;top:-20px">{{__('errors.this_field_is_required')}}</span>');
            error = true;
        }else{

            if(!validateEmail($('#email').val())){
                $('#email').val('');
                $('#email_error').html('<span style="color: red">{{__('errors.invalid_email')}}</span>');
                error = true;
            }else{
                $('#email_error').html('');
            }
        }

        if ($('#password').val() == '' )   {
            $('#password_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
            error = true;
        }else{
            $('#password_error').html('');
        }

        if(error){
            return false;
        }
        var formData = new FormData(this);
         save(formData,'{{route('login-post')}}');
    });
    $('#password-form').submit(function (e) {
        e.preventDefault();
        var error = false;

        if ($('#pw_email').val() == '' )   {
            $('#pw_email_error').html('<span style="color: red;top:-20px">{{__('errors.this_field_is_required')}}</span>');
            error = true;
        }else{

            if(!validateEmail($('#pw_email').val())){
                $('#pw_email').val('');
                $('#pw_email_error').html('<span style="color: red">{{__('errors.invalid_email')}}</span>');
                error = true;
            }else{
                $('#pw_email_error').html('');
            }
        }


        if(error){
            return false;
        }
        var formData = new FormData(this);
        save(formData,'{{route('forget-pw')}}');
    });


    function save(formData,route) {
        $.ajax({
            type: 'POST',
            url: route,
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
                if(arr[1]=='success'){
                    swal("{{__('general.congrats')}}", arr[0], "success");
                }else{
                    swal("{{__('general.error')}}", arr[0], "error");
                }
                setTimeout(function () {
                    window.open(arr[2], '_self');
                    // location.reload();
                }, 2000);
            },
            error: function (data) {
                if (data.status === 422) {
                    var errors = data.responseJSON.errors;
                    var message = "";
                    $.each(errors, function (key, value) {
                        message += key + ' : ' + value;
                    });

                    ////////////////////////swal("{{__('general.error')}}", message, "error");

                }
                //{"msg":"Yaz\u0131 Eklendi","id":19}
                if (data.status === 500) {
                    swal("HATA!", 'Hata oluştu', "error");

                }
            }
        });


    }


</script>
</body>
</html>
