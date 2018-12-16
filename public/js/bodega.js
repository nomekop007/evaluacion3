$(document).ready(function() {




    //valida los campos y guarda en base de datos
    $('#btnEnviar').click(function(event) {
        event.preventDefault();
        validarCampos();
    });

    //validar y guardar en bd
    function validarCampos() {
        var trabajador = $('#trabajador').val();
        var pallet = $('#pallet').val();
  
        //valida cada campo con if
        if (trabajador.length == 0 || pallet.length == 0) {
            if (trabajador.length == 0) {
                $('#trabajador').addClass('empty-input');
            } else {
                $('#trabajador').removeClass('empty-input');
            }
            if (pallet.length == 0) {
                $('#pallet').addClass('empty-input');
            } else {
                $('#pallet').removeClass('empty-input');
            }
            
            swal('algo paso', 'faltan datos ', 'error')
        } else {
            $('#trabajador').removeClass('empty-input');
            $('#pallet').removeClass('empty-input');
            //rescata url del boton
            var url = $('#btnEnviar').data('url');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    trabajador: trabajador,
                    pallet: pallet
                },
                success: function(datos) {
                    if (datos == "ok") {
                        location.reload();
                        swal('pallet Registrado en bodega', 'guardado en base de datos!', 'success')
                    } else if("no"){
                        swal('El pallet ya esta en bodega', 'ya ingresado ', 'error')
                    }else {
                         swal('algo paso', 'faltan datos ', 'error')
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }



        //modal mostrar historial de un registro
    $('.btn-history').click(function(event) {
        var bodega = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: bodega
            },
            success: function(datos) { 
            
             var html = '';
            for (i in datos) {
                         var c = '<tr>'+
                        '<td>'+datos[i].id+'</td>'+
                        '<td>'+datos[i].trabajador+'</td>'+
                        '<td>'+datos[i].is+' el '+datos[i].created_at+'</td>'+
                        '<td>'+datos[i].ubicacion+'</td>'+
                     '</tr>  ';

                html = html.concat(c);
            }
                $('.b_history').html(html);
               

                $('.modal_history').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
         $('#modal_history').modal('show');
    });


});