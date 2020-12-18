<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
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
      //  $Categor=Categorias::orderBy('idCategorias','DESC')->paginate();
      $buscar = $request->get('buscarpor');
      $tipo = $request->get('tipo');

      $Categor = Categorias::buscarpor($tipo, $buscar)->orderBy('idCategorias','DESC')->paginate(100);
        return view('Categorias.index',compact('Categor')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Categor = Categorias::all();
        return view('Categorias.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
              //
         
            $Categor = new Categorias();
            $Categor->Categoria = $request->Categoria;
    
            $Categor -> save();
     return redirect('/Categorias') ->with('success','Registro creado satisfactoriamente');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
             //
             $Categor = Categorias::find($idCategorias);
             return  view('Categorias.show',compact('Categor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit( $idCategorias)
    {
        //
        $Categor = Categorias::find($idCategorias);
        return  view('Categorias.edit',compact('Categor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idCategorias)
    {
        //
        $Categor = Categorias::find($idCategorias);
        $Categor->Categoria = $request->Categoria;
    
        $Categor -> save();
        return redirect('/Categorias') ->with('success','Registro creado satisfactoriamente');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idCategorias)
    {
        Categorias::find($idCategorias)->delete();
        return redirect()->route('Categorias.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
