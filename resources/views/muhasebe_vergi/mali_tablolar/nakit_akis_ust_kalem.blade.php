
<form class="form" id="ust-kalem-form" name="ust-kalem-form" action='{{route('nakit-akisi-ust-kalem-post')}}' method="post"
      enctype="multipart/form-data">
    {{csrf_field()}}



    <input type="hidden" name="year" id="year" value="{{$year}}">
    <input type="hidden" name="user_id" id="user_id" value="{{$who['user_id']}}">
    <input type="hidden" name="guest_id" id="guest_id" value="{{$who['guest_id']}}">


    @if(!empty($kalem))
        <input type="hidden" name="id" id="id" value="{{$kalem['id']}}">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">Üst Kalem Adı</label>
                    <input type="text" name="type_name" id="type_name" class="form-control input"
                           placeholder="Üst Kalem Adı" value="{{$kalem['type_name']}}">
                    <span id="type_name_error" style="height: 30px">&nbsp;</span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="">Üst Kalem Tipi</label>
                    <select name="type" id="type" class="form-control select" onchange="getOrder();">
                        <option value="1" @if($kalem['type']==1) selected @endif>Nakit Giriş</option>
                        <option value="2" @if($kalem['type']==0) selected @endif>Nakit Çıkış</option>
                    </select>

                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="">Sırası</label>
                    <select name="order" id="order" class="form-control select">
                        @for($i=$count;$i>0;$i--)
                            <option value="{{$i}}" @if($kalem['order']==$i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>

                </div>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-sm-12 text-center" >
                <input type="submit" class="btn btn-primary" value="{{$ex}}">

            </div>
        </div>
        @else
        <input type="hidden" name="id" id="id" value="0">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">Üst Kalem Adı</label>
                    <input type="text" name="type_name" id="type_name" class="form-control input"
                           placeholder="Üst Kalem Adı">
                    <span id="type_name_error" style="height: 30px">&nbsp;</span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="">Üst Kalem Tipi</label>
                    <select name="type" id="type" class="form-control select" onchange="getOrder();">
                        <option value="1" @if($type==1) selected @endif>Nakit Giriş</option>
                        <option value="2" @if($type==0) selected @endif>Nakit Çıkış</option>
                    </select>

                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label for="">Sırası</label>
                    <select name="order" id="order" class="form-control select">
                        @for($i=$count;$i>0;$i--)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>

                </div>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-sm-12 text-center" >
                <input type="submit" class="btn btn-primary" value="{{$ex}}">

            </div>
        </div>
        @endif




    <div class="clearfix"></div>


</form>
<script src="{{url('assets/js/save.js')}}"></script>
<script>

    function getOrder(){
        $.get( "{{url('muhasebe-vergi/mali-tablolar/nakit-akis-ust-kalem-get-order')}}/"+$('#type').val()+'/'+$('#id').val(), function( data ) {
            $('#order').html(data);

        });
    }


    $('#ust-kalem-form').submit(function (e) {

        e.preventDefault();
        var error = false;

        if ($('#type_name').val() == '') {
            $('#type_name_error').html('<span style="color: red">{{__('errors.this_field_is_required')}}</span>');
            error = true;
        }


        if (error) {
            return false;
        }
        var formData = new FormData(this);
        save(formData, '{{route('nakit-akisi-ust-kalem-post')}}', '');
    });


</script>
