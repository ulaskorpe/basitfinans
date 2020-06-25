<table class="table table-striped">
    <thead class="table-dark">
    <tr>
        <th><span id="label_yil"></span></th>
        @foreach($months as $month)
            <th>{{$month[1]}}</th>
        @endforeach

    </tr>
    </thead>
    <tbody>
    <tr class="bg-light">
        <td>Nakit Devir</td>
        @foreach($months as $month)
            <td class="nakitCell" id="nakit_{{$month[0]}}"></td>
        @endforeach

    </tr>

    <tr class="bg-success text-white">
        <td>Nakit Girişler</td>
        @foreach($months as $month)
            <td></td>
        @endforeach

    </tr>
    @foreach($incomes as $income)
        <tr>
        <td>{{$income['type_name']}} <br>

            <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="nakitAkisKalemiGuncelle(1,{{$income['id']}})">
                <i class="far fa-edit"   title="Gelir kalemi Düzenle"></i></a>
            <a href="#"><i class="fas fa-trash ml-3"  title="Gelir kalemi SİL"></i></a>
            <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="altKalemForm({{$income['id']}})"><i class="fas fa-plus ml-3"   title="Alt Gelir kalemi EKLE"></i></a>


        </td>
        @foreach($months as $month)
            <td data-toggle="modal" class="nakitCell" data-target="#exampleModal"  ></td>
        @endforeach
        </tr>
    @endforeach

    <tr class="bg-light"><td colspan="13" style="text-align: center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="nakitAkisKalemiEkle(1)">Nakit Giriş Üst Kalemi Ekle</button>

        </td></tr>

    <tr class="bg-danger text-white">
        <td>Nakit Çıkışlar</td>
        @foreach($months as $month)
            <td> </td>
        @endforeach

    </tr>
    @foreach($expanses as $expans)
        <tr>
            <td>{{$expans['type_name']}} <br>

                <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="nakitAkisKalemiGuncelle(2,{{$expans['id']}})"><i class="far fa-edit"   title="Gider kalemi Düzenle"></i></a>
                <a href="#"><i class="fas fa-trash ml-3"  title="Gider kalemi SİL"></i></a>
                <a href="#" data-toggle="modal" data-target="#exampleModal" onclick="altKalemForm({{$expans['id']}})"><i class="fas fa-plus ml-3"   title="Alt Gider kalemi EKLE"></i></a>


            </td>
            @foreach($months as $month)
                <td data-toggle="modal" class="nakitCell" data-target="#exampleModal"  ></td>
            @endforeach
        </tr>
    @endforeach

    <tr class="bg-light"><td colspan="13" style="text-align: center">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="nakitAkisKalemiEkle(2)">Nakit Çıkış Üst Kalemi Ekle</button>

        </td></tr>


    </tbody>

</table>


<script>
    $(document).ready(function () {
        hsp();
        monthNames();
    });


function hsp(){
    //$('#nakit_1').html(formatMoney($('#tutar').val()));
}

</script>