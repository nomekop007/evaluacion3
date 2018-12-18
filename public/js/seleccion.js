$(document).ready(function() {
   





    //valida los campos de MOVER A SELECCION
    $('#btnEnviar').click(function(event) {
        event.preventDefault();
        validarCampos();
    });

    //validar y guardar en bd
    function validarCampos() {
        var trabajador = $('#trabajador').val();
        var bodega = $('#bodega').val();
        //valida cada campo con if
        if (trabajador.length == 0 || bodega.length == 0) {
            if (trabajador.length== 0) {
                $('#trabajador').addClass('empty-input');
            } else {
                $('#trabajador').removeClass('empty-input');
            }
            if (bodega.length == 0) {
                $('#bodega').addClass('empty-input');
            } else {
                $('#bodega').removeClass('empty-input');
            }
            
            swal('algo paso', 'faltan datos ', 'error')
        } else {
            $('#trabajador').removeClass('empty-input');
            $('#bodega').removeClass('empty-input');
            //rescata url del boton
            //
            var url = $('#btnEnviar').data('url');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    trabajador: trabajador,
                    id: bodega
                },
                success: function(datos) {
                    if (datos == "ok") {
                       setTimeout(function() { window.location=window.location;},800);
                        swal('pallet enviado a Seleccion', 'modificado en base de datos!', 'success')
           
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













  //valida los campos de MOVER A BODEGA
    $('#btnEnviar2').click(function(event) {
        event.preventDefault();
        validarCampos2();
    });

    //validar y guardar en bd
    function validarCampos2() {
        var trabajador2 = $('#trabajador2').val();
        var bodega2 = $('#bodega2').val();
        //valida cada campo con if
        if (trabajador2.length == 0 || bodega2.length == 0) {
            if (trabajador2.length == 0) {
                $('#trabajador2').addClass('empty-input');
            } else {
                $('#trabajador2').removeClass('empty-input');
            }
            if (bodega2.length == 0) {
                $('#bodega2').addClass('empty-input');
            } else {
                $('#bodega2').removeClass('empty-input');
            }
            
            swal('algo paso', 'faltan datos ', 'error')
        } else {
            $('#trabajador2').removeClass('empty-input');
            $('#bodega2').removeClass('empty-input');
            //rescata url del boton
            //
            var url = $('#btnEnviar2').data('url');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    trabajador: trabajador2,
                    id: bodega2
                },
                success: function(datos) {
                    if (datos == "ok") {
                        setTimeout(function() { window.location=window.location;},800);
                        swal('pallet devuelto a Bodega', 'modifiado en base de datos!', 'success')
           
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

  //valida los campos de MOVER A BODEGA

     $('.btn-devolver').click(function(event) {
        var id = $(this).data('id');
        var url = $(this).data('url');
            console.log(id);
            console.log(url);


            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: id
                },
                success: function(datos) {
                    if (datos == "ok") {
                       setTimeout(function() { window.location=window.location;},800);
                        swal('pallet vaciado y devuelto a Bodega', 'modifiado en base de datos!', 'success')
           
                    }else {
                         swal('algo paso', 'faltan datos ', 'error')
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });




});