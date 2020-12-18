<?php

namespace App\Http\Controllers;
use App\Mapas; #Modelo de donde traigo los datos
use App\Eventos; # Modelo a donde se moverá

use Illuminate\Http\Request;

class modalmapaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
         $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
  
        $Maps = Mapas::buscarpor($tipo, $buscar)->orderBy('idMapa','DESC')->get();
        
       // $Maps=Mapas::orderBy('idMapa','DESC')->paginate();
        return view('eventos.modal',compact('Maps')); 
    }
}
