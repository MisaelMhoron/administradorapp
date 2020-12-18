<?php

namespace App\Http\Controllers;
use App\SitioTuristico;
use Illuminate\Http\Request;

class modalsitioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function index(Request $request)
    {
        //
          $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');
  
        $Sitio = SitioTuristico::buscarpor($tipo, $buscar)->orderBy('idsitioturistico','DESC')->get();
     
// $Sitio=SitioTuristico::orderBy('idsitioturistico','DESC')->paginate();
   
    // $Sitio=SitioTuristico::name($request->get('nombre'))->orderBy('idsitioturistico','ASC')->paginate();
 return view('Menu.modalsitio',compact('Sitio')); 



}
}