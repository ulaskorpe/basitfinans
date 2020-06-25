@if(false)
    <div class="accordion" id="accordionExample">

        @php
            $ay = 1;
        @endphp
        @foreach($months as $month)

            <div class="card">
                <div class=" btn btn-secondary"
                     id="{{\App\Http\Controllers\Helpers\GeneralHelper::fixName($month)}}"
                     data-toggle="collapse" data-target="#collapse_{{$ay}}"
                     aria-expanded="true" aria-controls="ay_{{$ay}}">
                    <h2 class="mb-0 d-flex justify-content-left" id="label_{{$ay}}"></h2>
                </div>

                <div id="collapse_{{$ay}}" class="collapse @if($ay==1) show @endif"
                     aria-labelledby="ay_{{$ay}}" data-parent="#accordionExample">
                    <div class="card-body">


                    </div>
                </div>
            </div>
            @php
                $ay ++;
            @endphp
        @endforeach
    </div>
@endif

<script>
/*
function monthNames(){
var yil = $('#yil').val();
@php $ay =1  @endphp
@foreach($months as $month)
    $('#label_{{$ay}}').html('{{$month}} '+yil);
    @php $ay++  @endphp
@endforeach
}*/
</script>