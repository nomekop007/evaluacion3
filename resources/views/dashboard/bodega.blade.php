@extends('layouts.plantilla')

@section('ubicacion')
    <section class="content-header">
      <h1>
        Bodega
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-columns"></i></i> Home</a></li>
        <li class="active">Bodega</li>
      </ol>
    </section>

@endsection





@section('contenido')
<form>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <div class="form row">
                <div class="form-group col-md-6">
                    <label for="Trabajador">
                        Trabajador
                    </label>
                    <input class="form-control" id="trabajador" maxlength="20" name="trabajador" placeholder="Trabajador" type="text">
                    </input>
                </div>
                <div class="form-group col-md-6">
                    <label for="pallets">
                        Pallets Registrados
                    </label>
                    <br>
                        <select class="form-control select2" id="pallet" name="pallet">
                            <option>
                            </option>
                            @foreach($datos['pallets'] as $b)
                            <option value=" {{ $b->id }}">
                                PALLET N° {{ $b->id }} DE PROVEEDES:  {{ $b->proveedor }}
                            </option>
                            @endforeach
                        </select>
                    </br>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-sm" data-url="{{ route('createBodega') }}" id="btnEnviar" type="submit">
                        ïngresar a bodega
                    </button>
                </div>
            </div>
        </div>
    </div>
   
</form>
<h3 class="text-center">
    Ubicacion real de todos los pallets
</h3>
<table class="table mi-dataTable text-center">
    <thead class="thead-dark ">
        <tr>
            <th scope="col">
                codigo del pallet
            </th>
            <th scope="col">
                Estado
            </th>
            <th scope="col">
                Trabajador
            </th>
            <th scope="col">
                Hora y fecha
            </th>
            <th scope="col">
                Ubicacion
            </th>


            <th scope="col">
                Historial
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach($datos['bodegas'] as $b)
        @if ($b->estado =='Inactivo')
            <tr>
            <td class="text-danger">
               {{ $b->pallet }} 
            </td>
            <td class="text-danger">
                {{ $b->estado }}
            </td>
            <td class="text-danger">
                 {{ $b->trabajador }}
            </td>
            <td class="text-danger">
                {{ $b->is }} a {{ $b->ubicacion }} el {{ $b->updated_at }}
            </td>
            <td class="text-danger"> 
                {{ $b->ubicacion }}
            </td>
            <td>
                <button class="btn btn-history" data-id="{{ base64_encode($b->id) }}" data-url="{{ route('history') }}" type="button">
                    <i class="fas fa-history">
                    </i>
                </button>
            </td>
        </tr>
        @endif
        @if ($b->estado !='Inactivo')
            <tr>
            <td>
               {{ $b->pallet }} 
            </td>
            <td>
                {{ $b->estado }}
            </td>
            <td>
                 {{ $b->trabajador }}
            </td>
            <td>
                {{ $b->is }} a {{ $b->ubicacion }} el {{ $b->updated_at }}
            </td>
            <td>
                {{ $b->ubicacion }}
            </td>
            <td>
                <button class="btn btn-history" data-id="{{ base64_encode($b->id) }}" data-url="{{ route('history') }}" type="button">
                    <i class="fas fa-history">
                    </i>
                </button>
            </td>
        </tr>
        @endif
    
        @endforeach
    </tbody>
</table>


<!-- Modal de eliminar -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal_history" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="mimodalLabel">
                    Historial de movimientos
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div>
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Trabajador</th>
                        <th scope="col">Fecha movimiento</th>
                        <th scope="col">Ubicacion</th>
                        
                     </tr>
                </thead>

            <tbody class="modal-body b_history">
         
            </tbody>
        

                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('jsextra')
<script src="{{ asset('js/bodega.js')}}">
</script>
@endsection
