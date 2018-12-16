<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


		//funcion para redireccionar a home  si usuario no esta logeado
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    return view('dashboard.home');
    }
}
