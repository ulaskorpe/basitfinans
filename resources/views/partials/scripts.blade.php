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


    function formatMoney(n) {
        return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.').replace(/\.(\d+)$/,',$1');
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
        }else{
            //  $('#brut').val(formatMoney($('#brut').val()));
            return true;
        }
    }
</script>