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
                    <h2>{{__('general.settings')}}</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" id="update-settings"
                          action="{{route('settings-post')}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{__('general.language')}}</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="lang" id="lang" class="form-control">
                                    <option value="tr" @if($admin['lang']=='tr') selected @endif>Türkçe</option>
                                    <option value="en" @if($admin['lang']=='en') selected @endif>English</option>
                                </select>
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
    <div class="row" style="min-height: 700px"></div>
@endsection

@section('scripts')

    <script>








        $('#update-settings').submit(function (e) {
            e.preventDefault();

            var error = false;


            if (error) {
                return false;
            }
            var formData = new FormData(this);
            save(formData);
        });

        function save(formData) {
            $.ajax({
                type: 'POST',
                url: '{{route('settings-post')}}',
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