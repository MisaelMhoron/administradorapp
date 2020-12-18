<?php

namespace App\Http\Controllers;

use App\Mapas;
use App\Mapcategory;
use Illuminate\Http\Request;

class MapasController extends Controller
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
        //$Maps=Mapas::orderBy('idMapa','DESC')->paginate();
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
  
        $Maps = Mapas::buscarpor($tipo, $buscar)->orderBy('idMapa','DESC')->paginate(100);
        return view('mapas.index',compact('Maps')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Maps = Mapas::all();
        return view('mapas.create');
   
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
            'titulo'    =>  'required',
            'descripcion'     =>  'required',
            'latitude'     =>  'required',
            'longitude'     =>  'required',
            'map_idMapCategoty'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
 $Maps = new Mapas();
$Maps->titulo = $request->titulo;
$Maps->descripcion = $request->descripcion;
$Maps->latitude = $request->latitude;
$Maps->longitude = $request->longitude;
$Maps->map_idMapCategoty = $request->map_idMapCategoty;

$Maps -> save();
 return redirect('/mapas') ->with('success','Registro creado satisfactoriamente');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function show(Mapas $mapas)
    {
        //
        $Maps = Mapas::find($idMapa);
        return  view('Mapas.show',compact('Maps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function edit( $idMapa)
    {
        //
        $Maps=Mapas::find($idMapa);
        return  view('mapas.edit',compact('Maps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idMapa)
    {
        //
        $request->validate([
            'titulo'    =>  'required',
            'descripcion'     =>  'required',
            'latitude'     =>  'required',
            'longitude'     =>  'required',
            'map_idMapCategoty'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
        $Maps = Mapas::Find($idMapa);
        $Maps->titulo = $request->titulo;
        $Maps->descripcion = $request->descripcion;
        $Maps->latitude = $request->latitude;
        $Maps->longitude = $request->longitude;
        $Maps->map_idMapCategoty = $request->map_idMapCategoty;
        
$Maps -> save();
return redirect()->route('mapas.index')->with('success','Registro actualizado satisfactoriamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapas  $mapas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idMapa)
    {
        //
        Mapas::find($idMapa)->delete();
        return redirect()->route('mapas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
