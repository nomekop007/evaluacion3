<?php

namespace App\Http\Controllers;

use App\pallet;
use App\bodega;
use App\history;
use Illuminate\Http\Request;

class palletController extends Controller
{
     //funcion para redireccionar a home  si usuario no esta logeado
    public function __construct()
    {
        $this->middleware('auth');
    }


    
    public function index()
    {
        $pallets = pallet::all();
        return view('dashboard.recepcion')->with('pallets', $pallets);
    }

    public function create(Request $Request)
    {
        $pallet            = new pallet;
        $pallet->proveedor = $Request->proveedor;
        $pallet->tipo      = $Request->tipo;
        $pallet->peso      = $Request->peso;

        //guardar en la base de datos
        if ($pallet->save()) {
            return "ok";
        } else {
            return "error";
        }

        return view('dashboard.recepcion');
    }

    public function getByID(request $request) //buscar pallet

    {
        $id   = base64_decode($request->id);
        $pallet = pallet::find($id);
        return $pallet;
    }


    public function update(Request $request)
    {
         $id       = base64_decode($request->id);
        $pallet = pallet::find($id);
    
        $pallet->proveedor = $request->proveedor;
        $pallet->tipo      = $request->tipo;
        $pallet->peso      = $request->peso;
   
        if ($pallet->update()) {
            return "ok";
        } else {
            return "error";
        }
       

    }


    public function destroy(request $request)
    {
        $id = base64_decode($request->id);
        $pallet = pallet::find($id);
        

        // ME GUSTA LA PEGA DE CHINO XD
          $bodegas = bodega::all();
         foreach ($bodegas as $p ) {
             if ($p->pallet ==  $id) {

                     $history = history::all();
                   foreach ($history as $h ) {
                    if ($h->bodega ==  $p->id) {
                          //si bodega tiene historial este se borra
                         $h->delete();
                      }
                  }
                //si el pallet esta ingresado en bodega tambien este registro se borra
                $p->delete();
             }
         }

        if ($pallet->delete()) {
            return "ok";
        } else{
            return "error";
        }
    }
}
