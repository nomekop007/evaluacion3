<?php

namespace App\Http\Controllers;

use App\bodega;
use App\pallet;
use App\history;
use Illuminate\Http\Request;

class bodegaController extends Controller
{
     //funcion para redireccionar a home  si usuario no esta logeado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $pallets = pallet::all();
         $bodegas = bodega::all();
         $data = array( // crear arreglo para pasar un arreglo con datos
            'pallets'=>$pallets,
            'bodegas'=>$bodegas,
        );
        return view('dashboard.bodega')->with('datos', $data); 

    }


    public function create(Request $Request)
    {
        $bodega             = new bodega;
        $bodega->estado     = 'Activo';
        $bodega->trabajador = $Request->trabajador;
        $bodega->is         = 'entrada';
        $bodega->ubicacion  = 'Bodega';
        $bodega->pallet     = $Request->pallet;

                
                //validar que el pallet no esta en bodega
         $bodegas = bodega::all();
         foreach ($bodegas as $p ) {
             if ($p->pallet ==  $bodega->pallet) {
                //si esta en bodega Arrojar mensaje
                return "no";
             }
         }


        //guardar en la base de datos
        if ($bodega->save()) {

         //creando registro en el historial
        $history             = new history;
        $history->trabajador = $Request->trabajador;
        $history->is         = 'creado';
        $history->ubicacion  = 'Bodega';
        $history->bodega = $bodega->id;
        $history->save();


            return "ok";
        } else {
            return "error";
        }

        return view('dashboard.bodega');
    }


}
