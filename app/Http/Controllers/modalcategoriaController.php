<?php

namespace App\Http\Controllers;
use App\Categorias;
use Illuminate\Http\Request;

class modalcategoriaController extends Controller
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
        $buscar = $request->get('buscarpor');
            $tipo = $request->get('tipo');
      
          $Categor = Categorias::buscarpor($tipo, $buscar)->orderBy('idCategorias','DESC')->get();
        return view('asignacategory.modalcategoria',compact('Categor')); 
    }
}