@extends('layouts.plantilla')

@section('ubicacion')
    <section class="content-header">
      <h1>
         Recepcion
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-columns"></i></i> Home</a></li>
        <li class="active">Recepcion</li>
      </ol>
    </section>

@endsection



@section('contenido')
<form>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
              <p class="bg-info text-center">Registrar Pallet en el sistema</p>
            <div class="form row">
                <div class="form-group col-md-6">
                    <label for="proveedor">
                        Proveedor
                    </label>
                    <input class="form-control" id="proveedor" maxlength="20" name="proveedor" placeholder="proveedor" type="text">
                    </input>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo de berries">
                        Tipo de berries
                    </label>
                    <br>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="arandano">
                                arandano
                            </option>
                            <option value="calafate">
                               calafate
                            </option>
                            <option value="cereza">
                                cereza
                            </option>
                            <option value="frambuesa">
                                frambuesa
                            </option>
                             <option value="fresa">
                                fresa
                            </option>
                             <option value="frutilla">
                                frutilla
                            </option>
                        </select>
                    </br>
                </div>
                <div class="form-group col-md-6">
                    <label for="peso">
                        Peso(kg)
                    </label>
                    <input class="form-control" id="peso" min="1" max="9999"  name="peso" placeholder="peso" type="number">
                    </input>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-sm" data-url="{{ route('createPallet') }}" id="btnEnviar" type="submit">
                        Guardar Pallet
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>





<table class="table mi-dataTable text-center">
    <thead class="thead-dark ">
        <tr>
            <th scope="col">
                Codigo
            </th>
            <th scope="col">
                Proveedor
            </th>
            <th scope="col">
                Hora y fecha
            </th>
            <th scope="col">
                tipo de berries
            </th>
            <th scope="col">
                peso
            </th>
            <th scope="col">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($pallets as $b)
        <tr>
            <td>
                {{ $b->id }}
            </td>
            <td>
                {{ $b->proveedor }}
            </td>
            <td>
                {{ $b->created_at }}
            </td>
            <td>
                {{ $b->tipo }}
            </td>
            <td>
                {{ $b->peso }}
            </td>
            <td>
                <button class="btn btn-info btn-edit btn-sm" data-id="{{ base64_encode($b->id) }}" data-url="{{ route('getPallet') }}">
                    <i class="far fa-edit">
                    </i>
                </button>
                <button class="btn btn-danger btn btn-delete btn-sm" data-id="{{ base64_encode($b->id) }}" data-url="{{ route('getPallet') }}">
                    <i class="far fa-trash-alt">
                    </i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



        <!-- Modal de eliminar -->
                <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal_eliminar" role="dialog" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mimodalLabel_eliminar">
                                    Modal title
                                </h5>
                            

                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body b_eliminar">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                    cancelar
                                </button>
                                <button class="btn btn-danger" data-dismiss="modal"  data-url="{{ route('deletePallet') }}" id="eliminar" type="button">
                                    eliminar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


  <!-- Modal de editar -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mimodalLabel_editar">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body b_editar col-md-12">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
        
        <button type="button" class="btn btn-info" data-dismiss="modal" data-url="{{ route('updatePallet') }}" id="editar">guardar cambios</button>
      </div>
    </div>
  </div>
</div> 



@endsection

@section('jsextra')
<script src="{{ asset('js/pallet.js')}}">
</script>
@endsection
