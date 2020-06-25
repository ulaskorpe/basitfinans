/*
* 0 -> msg
* 1 -> result
* 2 -> link
* 3 -> field
* */

function save(formData,route,formID,btn,modal_btn) {


    if(btn!=''){
        $('#'+btn).css('display', 'none');
        $('#'+btn+'-hourglass').css('display','');

    }

    $.ajax({
        type: 'POST',
        url:  route,
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

            console.log("*"+arr[0]+" * "+arr[1]+" * "+arr[2]+" * "+arr[3]+" * "+arr[4]+" * ");

            if (arr[1] =='success') {


                    swal("Tebrikler", arr[0], "success").then((value) => {
                        if (value) {

                            //  $('#modal-13').hide();
                            if(modal_btn!=''){
                               // alert("'"+modal_btn+"'");
                            $('#'+modal_btn).click();
                            }
                            // $('#logout-form').submit();
                        }
                    });


            } else {
                 //swal("HATA", arr[0], "error");
                if(arr[3] !=''){
                    //swal("HATA", arr[3]+':'+arr[4], "error");
                     //swal(arr[3]);
                    $('#'+arr[3]+'_error').html('<span class="form-error">'+arr[0]+"</span>");

                    if(arr[3]=='news_email'){

                        $('#haberdarcheck').css('margin-top','80px');
                    }
                    //$('#email_error').html(arr[0]);
                    $('#'+arr[3]).val('');
                }else{
                    swal("HATA", arr[3]+':'+arr[4], "error");
                }
                if(btn!='') {
                    $('#'+btn).css('display', '');
                    $('#'+btn+'-hourglass').css('display', 'none');
                }
            }
            if(formID != ''){
                document.getElementById(formID).reset();
            }else{

                setTimeout(function () {
                    if(arr[2]==''){

                        if(arr[3]!=''){ ///field error

                           $('#'+arr[3]).val('');
                           $('#'+arr[3]).focus();
                        }else{
                           // if(arr[4]=='' && arr[4]!='undefined'){
                                //swal("ss");
                               location.reload();

                            //}
                        }
                    }else{

                       // swal("'"+arr[2]+"'+'"+arr[4]+"'");

                         //if(arr[4]=='') {

                             window.open(""+arr[2]+"",'_self');
                        //}else{
                            //swal("okkk");
                         //}
                    }
                }, 3000);
                if(btn!='') {
                    $('#'+btn).css('display', '');
                    $('#'+btn+'-hourglass').css('display', 'none');
                }
            }
        },
        error: function (data) {
            if (data.status === 422) {
                var errors = data.responseJSON.errors;
                var message = "";
                $.each(errors, function (key, value) {
                    message += key + ' : ' + value;
                });


                  //  $('#'+arr[3]).html(message);


              swal("HATA!", message, "error");

                if(btn!='') {
                    $('#'+btn).css('display', '');
                    $('#'+btn+'-hourglass').css('display', 'none');
                }

            }
            //{"msg":"Yaz\u0131 Eklendi","id":19}
            if (data.status === 500) {
                swal("HATA!", 'Hata oluştu', "error");
                if(btn!='') {

                    $('#'+btn).css('display', '');
                    $('#'+btn+'-hourglass').css('display', 'none');
                }
            }
        }
    });
}





