<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>

    $('.nav-icon').click(function () {
        $('#nav-links').toggleClass("responsive");
        return false;
    });



</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{url('assets/js/bootnavbar.js')}}" ></script>
<script src="{{url('assets/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{url('assets/js/retina.js')}}"></script>
<script>
    $(function () {
        $('#main_navbar').bootnavbar();
    })
</script>