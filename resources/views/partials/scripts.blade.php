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
<script src="{{url('assets/js/jquery.turkLirasi.min.js')}}"></script>
<script src="{{url('assets/js/typeahead.bundle.js')}}"></script>
<script>
    $(function () {
        $('#main_navbar').bootnavbar();


        var cars =[ "Eşit Taksitli Kredi",
            "Spot Kredi",
            "Mevzuat Faizi",
            "Kur Endeksleri",
            "Enflasyon",
            "Döviz Çevirici",
            "Paranın Bugünkü Değeri",
            "Kira Artışı Hesaplama",
            "Gelir Tablosu",
            "Bilanço",
            "Nakit Akışı",
            "Kira Gelir Vergisi",
            "Stopaj Hesaplama",
            "Tapu Harcı Hesaplama",
            "Amortisman",
            "KDV Kanunu",
            "Vergi Usül Kanunu",
            "İş Kanunu",
            "Banka Talimatı",
            "İzin Formu",
            "İş Sözleşmesi",
            "İzin Formu",
            "Avans Formu",
            "Maaş Hesaplama",
            "Kıdem Tazminatı",
            "İhbar Tazminatı",
            "İşsizlik Maaşı Hesaplama"];

        // Constructing the suggestion engine
        var cars = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            local: cars
        });

        // Initializing the typeahead
        $('#search_find').typeahead({
                hint: true,
                highlight: true, /* Enable substring highlighting */
                minLength: 1 /* Specify minimum characters required for showing result */
            },
            {
                name: 'cars',
                source: cars
            });
    });


    function formatMoney(n) {
     /*   n = String(n);
        n = n.replace('.','');
        t = n.split(',');
        if(t[1]==null){
        n=t[0];
        }else{
            console.log(t[1]);
            n=t[0]+'.'+t[1];
        }*/
    // var t = parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.').replace(/\.(\d+)$/,',$1');
    // console.log(t);
        var t = parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.').replace(/\.(\d+)$/,',$1');

        return t;
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            if(charCode == 44 || charCode == 46){
                return true;
            }else{
                return false;
            }

        }else{
            //  $('#brut').val(formatMoney($('#brut').val()));
            return true;
        }
    }


    function getRoute(key){
        if(key!=''){

        $.get( "{{url('/get-route')}}/"+key, function( data ) {
            if(data=='yok'){
                swal({
                    icon: 'error',
                    text: 'Böyle bir link mevcut değil',

                });
                $('#search_find').val('');
            }else{
                //console.log(data);
                 window.open(data,'_self');
            }

        });

        }
    }




</script>