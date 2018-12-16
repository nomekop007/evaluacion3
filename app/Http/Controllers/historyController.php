<?php

namespace App\Http\Controllers;

use App\bodega;
use App\history;

use Illuminate\Http\Request;

class historyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //muestra el historial de la bodega seleccionada a traves del modal 
    public function index(request $request)
    {
        $id = base64_decode($request->id);

        //select * from `histories` where `bodega` = id
        //pallet::all();
        $history = history::where('bodega',$id)->get();

        return $history;
    }






// controller del mantenedor seleccion
    public function seleccion()
    {
        $bodegas = bodega::where('estado','Activo')->get();
        return view('dashboard.seleccion')->with('bodegas', $bodegas);

    }
   
    public function mover(request $request)
    {
        $id                 = base64_decode($request->id);
        $bodega             = bodega::find($id);
        $bodega->trabajador = $request->trabajador;
        $bodega->ubicacion  = 'Seleccion';
         $bodega->is  = 'salida';

        if ($bodega->update()) {

             //creando registro en el historial
        $history             = new history;
        $history->trabajador = $request->trabajador;
        $history->is         = 'salio';
        $history->ubicacion  = 'Seleccion';
        $history->bodega = $bodega->id;
        $history->save();

            return "ok";
        } else {
            return "error";
        }

    }

        public function mover2(request $request)
    {
        $id                 = base64_decode($request->id);
        $bodega             = bodega::find($id);
        $bodega->trabajador = $request->trabajador;
        $bodega->ubicacion  = 'Bodega';
         $bodega->is  = 'entrada';

        if ($bodega->update()) {


                  //creando registro en el historial
        $history             = new history;
        $history->trabajador = $request->trabajador;
        $history->is         = 'entro';
        $history->ubicacion  = 'Bodega';
        $history->bodega = $bodega->id;
        $history->save();

            return "ok";
        } else {
            return "error";
        }

    }



        public function vaciar(request $request)
    {
        $id                 = base64_decode($request->id);
        $bodega             = bodega::find($id);

        
        $bodega->estado = 'Inactivo';
        $bodega->ubicacion  = 'Bodega';
         $bodega->is  = 'entrada';

        if ($bodega->update()) {


      //creando registro en el historial
      //la salida a paking
        $history             = new history;
        $history->trabajador = $bodega->trabajador;
        $history->is         = 'ingreso';
        $history->ubicacion  = 'Packing';
        $history->bodega = $bodega->id;
        $history->save();

    //la entrada a bodega
        $history             = new history;
        $history->trabajador = $bodega->trabajador;
        $history->is         = 'entro';
        $history->ubicacion  = 'Bodega';
        $history->bodega = $bodega->id;
        $history->save();

            return "ok";
        } else {
            return "error";
        }

    }
}
