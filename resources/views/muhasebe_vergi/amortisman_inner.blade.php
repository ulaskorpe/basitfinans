
<table class="table table-striped" id="amortisman_table">
    <thead>
    <tr>
        <th>Yıl</th>
        <th>Aktif Değer</th>
        <th>Amortisman Tutarı</th>
        <th>Birikmiş Amortsiman</th>
        <th>Net Aktif Değer</th>
    </tr>
    </thead>
    <tbody>

    </tbody>

</table>



<div style="width:100%;text-align: center">
    <canvas id="canvas"></canvas>
</div>


<script>

    $( document ).ready(function() {
         amortisman();
    });


    function amortisman(){

        var a_orani = parseInt('{{$a_orani}}');
        var a_yontemi = parseInt('{{$a_yontemi}}');
        var tutar = parseFloat({{$tutar}});//parseInt('{{$tutar}}');
       // console.log("2:"+tutar);
        var yil_sayisi = 100/a_orani;//((tutar/a_orani)/1000).toFixed(2);
        yil_sayisi = yil_sayisi * 1;

        var yillar = [];
        var aktif_deger_list = [];
        var amortismant_tutari_list = [];
        var birikmis_amortisman_list  = [];
        var net_aktif_deger_list = [];


        var aktif_deger = tutar ;

        var table = document.getElementById("amortisman_table");
        table.innerHTML = "";


        var row = table.insertRow(0);


        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);


        cell1.innerHTML = "Yıl";
        cell2.innerHTML = 'Amortisman Tutarı';
        cell3.innerHTML = 'Birikmiş Amortisman';
        cell4.innerHTML = 'Net Aktif Değer';
        var cont = false;
        if(a_yontemi == 1){

            for (var i=1; i<(yil_sayisi+2);i++) {
               // console.log(i);
                yillar[i - 1] = i + ".yıl";
                aktif_deger_list[i - 1] = aktif_deger.toFixed(2);
                amortismant_tutari_list[i - 1] = (aktif_deger_list[i - 1] * a_orani / 100).toFixed(2);
                birikmis_amortisman_list[i - 1] = (i == 1) ? amortismant_tutari_list[i - 1] * 1 : (amortismant_tutari_list[i - 1] * 1) + (birikmis_amortisman_list[i - 2] * 1);
                net_aktif_deger_list[i - 1] = aktif_deger_list[i - 1] - birikmis_amortisman_list[i - 1];
                net_aktif_deger_list[i - 1] = ( net_aktif_deger_list[i - 1] >= 0 ) ? net_aktif_deger_list[i - 1].toFixed(2) : 0;
                birikmis_amortisman_list[i - 1] = (birikmis_amortisman_list[i - 1] * 1 <= tutar ) ? (birikmis_amortisman_list[i - 1] * 1).toFixed(2) : (tutar * 1).toFixed(2);
                //if(i*1==Math.floor(yil_sayisi)+1){
                 if(false){
                    amortismant_tutari_list[i - 1]= net_aktif_deger_list[i - 2];
                    birikmis_amortisman_list[i - 1]=aktif_deger_list[i - 1];
                    net_aktif_deger_list[i - 1] = 0;

                }
                ////table

                var row = table.insertRow(i);


                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);


                cell1.innerHTML = i + ".Yıl";

                cell2.innerHTML = formatMoney(amortismant_tutari_list[i - 1])+' TL';
                cell3.innerHTML = formatMoney(birikmis_amortisman_list[i - 1])+' TL';
                cell4.innerHTML = formatMoney(net_aktif_deger_list[i - 1])+ ' TL';
                if (net_aktif_deger_list[i - 1] == 0) {
                     //  continue;
                    cont = true;
                }

                if (net_aktif_deger_list[i - 1] == 0 && cont) {
                      break;
                }

            }

            $('#yil_sayisi').html(i );
            var amortisman_tipi = "Normal Amortisman";
        }else{ //// azalan
            var amortisman_tipi = "Azalan Bakiyeler";
            var aktif_deger = tutar ;
            var cont = false;
            for (var i=1; i<(yil_sayisi+2);i++){


                yillar[i - 1] = i + ".yıl";
                aktif_deger_list[i - 1] = aktif_deger.toFixed(2);

                if(i==1){
                    amortismant_tutari_list[i - 1] = (aktif_deger_list[i - 1]*a_orani*2 / 100).toFixed(2);
                    birikmis_amortisman_list[i - 1] = amortismant_tutari_list[i - 1];
                    net_aktif_deger_list[i - 1] =(aktif_deger_list[i - 1] - birikmis_amortisman_list[i - 1]).toFixed(2) ;
                }else{
                    amortismant_tutari_list[i - 1] = (net_aktif_deger_list[i-2] *a_orani*2 / 100).toFixed(2);
                    birikmis_amortisman_list[i - 1] = (amortismant_tutari_list[i - 1 ]*1 + birikmis_amortisman_list[i - 2]*1).toFixed(2);
                    net_aktif_deger_list[i - 1] = (net_aktif_deger_list[i - 2 ]*1 - amortismant_tutari_list[i - 1]*1).toFixed(2);
                  //  console.log(i + ':'+Math.floor(yil_sayisi));
                 //   if(amortismant_tutari_list[i - 1]*1 < (aktif_deger_list[i - 1]*1)/yil_sayisi){
                    if(i*1==Math.floor(yil_sayisi)+2){

                        amortismant_tutari_list[i - 1]= net_aktif_deger_list[i - 1];
                        birikmis_amortisman_list[i - 1]=aktif_deger_list[i - 1];
                        net_aktif_deger_list[i - 1] = 0;

                    }

                }

                ////table

                var row = table.insertRow(i);


                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);


                cell1.innerHTML = i + ".Yıl";

                cell2.innerHTML = formatMoney(amortismant_tutari_list[i - 1])+' TL';
                cell3.innerHTML = formatMoney(birikmis_amortisman_list[i - 1])+' TL';
                cell4.innerHTML = formatMoney(net_aktif_deger_list[i - 1])+ ' TL';
                if (net_aktif_deger_list[i - 1] == 0) {
                    //   continue;
                    cont = true;
                }

                if (net_aktif_deger_list[i - 1] == 0 && cont) {
                    break;
                }
            }

        }
     //   $('#tutar_mask').val(formatMoney($('#tutar_mask').val()));
    //    $('#yil_sayisi').html(i );
        //console.log(net_aktif_deger_list);
        //  var MONTHS = ['Ocak', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                labels: yillar,
                datasets: [{
                    label: 'Aktif Değer',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: aktif_deger_list,
                    fill: false,
                }, {
                    label: 'Amortisman Tutarı',
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data:  amortismant_tutari_list,


                }


                    , {
                        label: 'Birikmiş Amortsiman',
                        fill: false,
                        backgroundColor: window.chartColors.purple,
                        borderColor: window.chartColors.purple,
                        data:birikmis_amortisman_list,


                    }

                    , {
                        label: 'Net Aktif Değer',
                        fill: false,
                        backgroundColor: window.chartColors.green,
                        borderColor: window.chartColors.green,
                        data: net_aktif_deger_list


                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: amortisman_tipi,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Türk Lirası'
                        }
                    }]
                }
            }
        };

        var ctx = document.getElementById('canvas').getContext('2d');
      //  window.myLine = new Chart(ctx, config);

        return true;
    }



</script>