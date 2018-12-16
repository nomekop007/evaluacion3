$(document).ready(function() {

    //valida los campos y guarda en base de datos
    $('#btnEnviar').click(function(event) {
        event.preventDefault();
        validarCampos();
    });

    //scrips para limitar los caracteres numericos del input peso
    var input = document.getElementById('peso');
    if (input != null) {
        input.addEventListener('input', function() {
            if (this.value.length > 4) this.value = this.value.slice(0, 4);
        });
    }
    var input = document.getElementById('pesoZ');
    if (input != null) {
        input.addEventListener('input', function() {
            if (this.value.length > 4) this.value = this.value.slice(0, 4);
        });
    }

    //config de select2s
    $(".select2").select2({
        language: {
            noResults: function() {
                return "No hay resultado";
            },
            searching: function() {
                return "Buscando..";
            }
        }
    });

    //validar y guardar en bd
    function validarCampos() {
        var proveedor = $('#proveedor').val();
        var tipo = $('#tipo').val();
        var peso = $('#peso').val();
        //valida cada campo con if
        if (proveedor.length == 0 || tipo.length == 0 || peso.length == 0) {
            if (proveedor.length == 0) {
                $('#proveedor').addClass('empty-input');
            } else {
                $('#proveedor').removeClass('empty-input');
            }
            if (tipo.length == 0) {
                $('#tipo').addClass('empty-input');
            } else {
                $('#tipo').removeClass('empty-input');
            }
            if (peso.length == 0) {
                $('#peso').addClass('empty-input');
            } else {
                $('#peso').removeClass('empty-input');
            }
            swal('algo paso', 'faltan datos ', 'error')
        } else {
            $('#proveedor').removeClass('empty-input');
            $('#tipo').removeClass('empty-input');
            $('#peso').removeClass('empty-input');
            //recacar url del boton
            var url = $('#btnEnviar').data('url');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    proveedor: proveedor,
                    tipo: tipo,
                    peso: peso
                },
                success: function(datos) {
                    console.log(datos);
                    if (datos == "ok") {
                        location.reload();
                        swal('pallet Registrado', 'guardado en base de datos!', 'success')
                    } else {
                        swal('algo paso', 'faltan datos ', 'error')
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }

    //modal eliminar pallet
    $('.btn-delete').click(function(event) {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(datos) { //remplazando los datos del modal con los de la base de datos
                $('#mimodalLabel_eliminar').html("Eliminar Pallet N° " + datos['id']);

            $('#eli').val(datos['id'])

                var html = ' ¿esta seguro de eliminar esto?'+

                 '<input id="eli" name="idModalEliminarPallet" type="hidden" value="'+id+'">';


                $('.b_eliminar').html(html);
                $('.modal_eliminar').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
        $('#modal_eliminar').modal('show');        
    });

    //eliminar pallet
    $('#eliminar').click(function(event) {
        event.preventDefault();

      var id  =  $('#eli').val();


        var url = $(this).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(datos) {
                if (datos == "ok") {
                    location.reload();
                    Swal({
                        type: 'error',
                        title: 'pallet eliminado'
                    })
                } else {
                    swal('algo paso', 'faltan datos ', 'error')
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

        //editar pallet
    $('#editar').click(function(event) {
         event.preventDefault();


        var id  =  $('#edi').val();
        var proveedor  =  $('#proveedorZ').val();
        var tipo  =  $('#tipoZ').val();
        var peso  =  $('#pesoZ').val();

if(proveedor.length==0||tipo.length==0||peso.length==0){
            if(proveedor.length==0){
                $('#proveedorZ').addClass('empty-input');
            }else{
                $('#proveedorZ').removeClass('empty-input');
            }
            if(tipo.length==0){
                $('#tipoZ').addClass('empty-input');
            }else{
                $('#tipoZ').removeClass('empty-input');
            }
            if(peso.length==0){
                $('#pesoZ').addClass('empty-input');
            }else{
                $('#pesoZ').removeClass('empty-input');
            }

            swal('algo paso', 'faltaron datos en el modal ', 'error')
        }else{
            $('#proveedorZ').removeClass('empty-input');
            $('#tipoZ').removeClass('empty-input');
            $('#pesoZ').removeClass('empty-input');
        

        var url = $(this).data('url');
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id,
                proveedor:proveedor,
                tipo:tipo,
                peso:peso
            },
            success: function(datos) {
                if (datos == "ok") {
                    location.reload();
                    Swal({
                        type: 'success',
                        title: 'pallet editado'
                    })
                } else {
                    swal('algo paso', 'faltan datos ', 'error')
                }
            },
            error: function(error) {
                console.log(error);
                 swal('algo paso', 'faltan datos ', 'error')
            }
        });

         }
    });



       //modal editar pallet
    $('.btn-edit').click(function(event) {
        var id = $(this).data('id');
        var url = $(this).data('url');

        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: id
            },
            success: function(datos) { //remplazando los datos del modal con los de la base de datos
                $('#mimodalLabel_editar').html("Editar Pallet N° " + datos['id']);
                           var m = datos['tipo'];

                    //completar formulario

var html = '<div class="form-row">'+
              '<div class="form-group col-md-12">'+
                  '<div class="form row">'+
                        '<input id="edi" name="idModalEditarPallet" type="hidden" value="'+id+'">'+
                      '<div class="form-group col-md-6">'+
                            '<label for="proveedor"> proveedor</label>'+
                           '<input class="form-control" id="proveedorZ" maxlength="20" name="proveedor" placeholder="proveedor" type="text" value="' + datos['proveedor'] + '">'+
                          '</input>'+
                     '</div>'+


                     '<div class="form-group col-md-6">'+
                            '<label for="peso">peso'+
                            '</label>'+
                            '<input class="form-control" min="1" max="9999"  id="pesoZ" name="peso" placeholder="peso" type="number" value="' + datos['peso'] + '">'+
                            '</input>'+
                         '</div>'+

                         '<div class="form-group col-md-6">'+
                            '<label for="tipo">tipo sociales</label><br>'+
                            '<select class="select2 form-control" id="tipoZ" name="tipo">'+
                             '<option value="' + m + '">' + m + '</option>'+
                                '<option value="arandano">arandano</option>'+
                            '<option value="calafate">calafate</option>'+
                            '<option value="cereza">cereza</option>'+
                            '<option value="frambuesa">frambuesa</option>'+
                             '<option value="fresa">fresa</option>'+
                             '<option value="frutilla">frutilla</option> '+                       
                           '</select>'+
                        '</div>'+

                  '</div>'+
             '</div>'+
         '</div>';





                $('.b_editar').html(html);
                $('.modal_editar').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });
        $('#modal_editar').modal('show');
    });






});


