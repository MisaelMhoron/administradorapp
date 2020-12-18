<?php

namespace App\Http\Controllers;

use App\Mapcategory;
use App\Mapas;

use Illuminate\Http\Request;

class MapcategoryController extends Controller
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
       // $MapCate=Mapcategory::orderBy('idMapCategoty','DESC')->paginate();

       $buscar = $request->get('buscarpor');
       $tipo = $request->get('tipo');
 
       $MapCate = Mapcategory::buscarpor($tipo, $buscar)->paginate(100);
        return view('mapascategory.index',compact('MapCate')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $MapCate = Mapcategory::all();
        return view('mapascategory.create');
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
            'Categoria'    =>  'required',
        ]);
        $MapCate = new Mapcategory();
        $MapCate->Categoria = $request->Categoria;

        $MapCate -> save();
 return redirect('/mapascategory') ->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mapcategory  $mapcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Mapcategory $mapcategory)
    {
        //
        $MapCate = Mapcategory::find($idMapCategoty);
        return  view('mapascategory.show',compact('Maps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapcategory  $mapcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($idMapCategoty)
    {
    
        $MapCate = Mapcategory::find($idMapCategoty);
        return  view('mapascategory.edit',compact('MapCate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapcategory  $mapcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idMapCategoty)
    {
        //
        $request->validate([
            'Categoria'    =>  'required',
        ]);

        $MapCate = Mapcategory::find($idMapCategoty);
        $MapCate->Categoria = $request->Categoria;
        $MapCate -> save();
 return redirect('/mapascategory') ->with('success','Registro creado satisfactoriamente');
   
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapcategory  $mapcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idMapCategoty)
    {
        //
        Mapcategory::find($idMapCategoty)->delete();
        return redirect()->route('mapascategory.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
