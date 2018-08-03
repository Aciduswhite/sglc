
$(function() {

    $('.change_status').on('ifChanged', function (e) {

        e.preventDefault();
        var valore;
        var ruta = $(this).attr('data-carpeta');
        var input_check = $(this).is(':checked');
        var id_attr = $(this).attr('id').split('_');
        var id = id_attr[1];
        if (input_check) {
            valore = 1;
        } else {
            valore = 0;
        }
        uso(ruta, id, valore);


    });

    function uso(ruta, id, valore){

        $.get(ruta +'/'+id+'/uso/'+valore);
        return false;


    }



    $('#selectEstado').on('change',function(){


        var value=$('#selectEstado option:selected').val();
        var token=$('#token').val();
        var html="";

        //CAMBIAR LA URL CUANDO SE SUBA A SERVIDOR
        var url = "../../estados/"+value+"/municipios";


        $.ajax({
            url: url,
            headers:{'X-CSRF-TOKEN':token},
            type: 'GET',
            dataType:"json",
            success:function(objAJAX)
            {
                $.each( objAJAX, function( key, value ) {
                    html += '<option value="' + value['id'] + '">' + value['nombre'] + '</option>'
                });
                $('#fillCity').html('<option value="">Selecciona Municipio</option>' + html);

            },
            error:function(xhr, textStatus, error)
            {
                // console.log('msg1: ' + xhr.statusText);
                // console.log('msg2: ' + textStatus);
                // console.log('msg3: ' + error);
            }
        });

    });





});