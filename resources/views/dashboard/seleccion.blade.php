@extends('layouts.plantilla')

@section('ubicacion')
    <section class="content-header">
      <h1>
        Seleccion
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-columns"></i></i> Home</a></li>
        <li class="active">Seleccion</li>
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
                    <label for="bodega">
                        Pallets en bodega
                    </label>
                    <br>
                        <select class="form-control select2" id="bodega" name="bodega">
                        	<option>
                            </option>
                             @foreach($bodegas as $b)
                             	@if ($b->ubicacion=='Bodega')
                            <option value=" {{ base64_encode($b->id) }}">
                                PALLET N° {{ $b->pallet }}
                            </option>
                            	@endif

                            @endforeach
                        </select>
                    </br>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-sm" data-url="{{ route('moverSeleccion') }}" id="btnEnviar" type="submit">
                        ïngresar a seleccion
                    </button>
                </div>
            </div>
        </div>
    </div>
   
</form>


<br><br>

<form>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <div class="form row">
                <div class="form-group col-md-6">
                    <label for="Trabajador2">
                        Trabajador
                    </label>
                    <input class="form-control" id="trabajador2" maxlength="20" name="trabajador2" placeholder="Trabajador" type="text">
                    </input>
                </div>
                <div class="form-group col-md-6">
                    <label for="bodega2">
                        Pallets en Seleccion
                    </label>
                    <br>
                        <select class="form-control select2" id="bodega2" name="bodega2">
                        	<option>
                            </option>
                             @foreach($bodegas as $b)
                             	@if ($b->ubicacion=='Seleccion')
                            <option value=" {{ base64_encode($b->id) }}">
                                PALLET N° {{ $b->pallet }}
                            </option>
                            	@endif

                            @endforeach
                        </select>
                    </br>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-sm"  data-url="{{ route('moverBodega') }}" id="btnEnviar2" type="submit">
                        ïngresar a Bodega
                    </button>
                </div>
            </div>
        </div>
    </div>
   
</form>

<h3 class="text-center">
   Pallets en Seleccion
</h3>

<table class="table mi-dataTable text-center">
    <thead class="thead-dark ">
        <tr>
            <th scope="col">
                ID
            </th>
            <th scope="col">
                Estado
            </th>
            <th scope="col">
                Trabajador
            </th>
            <th scope="col">
                Ubicacion
            </th>
            <th scope="col">
                codigo del pallet
            </th>
            <th scope="col">
                Hora y fecha
            </th>
            <th scope="col">
                ingresar a paking <br>(se devuelve vacia a bodega)
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($bodegas as $b)
        @if ($b->ubicacion=='Seleccion')
        	 <tr>
            <td>
                {{ $b->id }}
            </td>
            <td>
                {{ $b->estado }}
            </td>
            <td>
                {{ $b->trabajador }}
            </td>
            <td>
                {{ $b->ubicacion }}
            </td>
            <td>
                {{ $b->pallet }}
            </td>
            <td>
                {{ $b->is }} a {{ $b->ubicacion }} el {{ $b->updated_at }}
            </td>
            <td>
                <button class="btn btn-success btn-sm btn-devolver" data-id="{{ base64_encode($b->id) }}" data-url="{{ route('devolver') }}">
                   ingresar a Packing
                </button>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>


@endsection

@section('jsextra')
<script src="{{ asset('js/seleccion.js')}}">
</script>
@endsection