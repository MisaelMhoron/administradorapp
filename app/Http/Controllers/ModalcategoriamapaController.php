<?php

namespace App\Http\Controllers;

use App\Mapcategory;
use Illuminate\Http\Request;

class ModalcategoriamapaController extends Controller
{
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
      
          $MapCate = Mapcategory::buscarpor($tipo, $buscar)->orderBy('idMapCategoty','DESC')->get();
        
        return view('mapas.modalcategoria',compact('MapCate')); 

    }

}