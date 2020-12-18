<?php

namespace App\Http\Controllers;

use App\Asignacionescategory;
use Illuminate\Http\Request;

class AsignacionescategoryController extends Controller
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
       // $AsiCategory=Asignacionescategory::orderBy('idAsignacionesCat','DESC')->paginate();
       $buscar = $request->get('buscarpor');
       $tipo = $request->get('tipo');
 
       $AsiCategory = Asignacionescategory::buscarpor($tipo, $buscar)->orderBy('idAsignacionesCat','DESC')->paginate(100);

        return view('asignacategory.index',compact('AsiCategory')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $AsiCategory = Asignacionescategory::all();
        return view('asignacategory.create');

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
        $request->validate([
            'idCategorias'    =>  'required',
        ]);
        $AsiCategory = new Asignacionescategory();
        $AsiCategory->idCategorias = $request->idCategorias;
        $AsiCategory->idEventos = $request->idEventos;

        $AsiCategory -> save();
 return redirect('/asignacategory') ->with('success','Registro creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignacionescategory  $asignacionescategory
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacionescategory $asignacionescategory)
    {
        //
        $AsiCategory = Asignacionescategory::find($idAsignacionesCat);
        return  view('asignacategory.show',compact('AsiCategory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignacionescategory  $asignacionescategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $idAsignacionesCat)
    {
        //

        $AsiCategory = Asignacionescategory::find($idAsignacionesCat);
        return  view('asignacategory.edit',compact('AsiCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignacionescategory  $asignacionescategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idMapCategoty)
    {
        //
        $request->validate([
            'idCategorias'    =>  'required',
        ]);
        $AsiCategory = Asignacionescategory::find($idAsignacionesCat);
        $AsiCategory->idCategorias = $request->idCategorias;
        $AsiCategory->idEventos = $request->idEventos;

        $AsiCategory -> save();
        return redirect('/asignacategory') ->with('success','Registro creado satisfactoriamente');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignacionescategory  $asignacionescategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idMapCategoty)
    {
        //
        Asignacionescategory::find($idMapCategoty)->delete();
        return redirect()->route('asignacategory.index')->with('success','Registro eliminado satisfactoriamente');

    }
}
