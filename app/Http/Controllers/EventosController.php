<?php

namespace App\Http\Controllers;

use App\Eventos;
use App\Login;
use App\Mapas;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;
use Image;


class EventosController extends Controller
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
      //  dd($request->get('Nombre'));

 /*     $Event=Eventos::name($request->get('Nombre'))->orderBy('idEventos','DESC')->paginate();
      //$Event=Eventos::orderBy('idEventos','DESC')->paginate();
        return view('Eventos.index',compact('Event')); */

        
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
  
        $Event = Eventos::buscarpor($tipo, $buscar)->orderBy('idEventos','DESC')->paginate(100);
        return view('eventos.index',compact('Event'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $jugos = Jugos::all();
       $Event = Eventos::all();
        return view('eventos.create');
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
            'imagen'    =>  'required',
            'Nombre'     =>  'required',
            'Descripcion'     =>  'required',
            'fecha'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
       $Event=request()->except('_token');

//----------- GUARDAR URL EN CARPETA IMAGES-------------///
    if ($request->hasFile('imagen')){

$file = $request->file('imagen');
//obtenemos el nombre del archivo
$name = time().$file->getClientOriginalName();
//indicamos que queremos guardar un nuevo archivo en el disco local
$file->move(public_path().'/images/uploads/eventos/', $name);
$picture = URL::asset('images/uploads/eventos/'.$name);

/************************************** */

$thumbnailpath = public_path('images/uploads/eventos/'.$name);
$img = Image::make($thumbnailpath)->resize(960, 640)->save($thumbnailpath);
/********************************** */


}else{
if ($request->hasFile('imagen') == null) {
$picture = null;

}
}
     $Event = new Eventos();
    $Event ->imagen =  $picture;
        $Event ->Nombre = $request ->Nombre;
        $Event ->Descripcion = $request ->Descripcion;
    	$Event ->fecha = $request ->fecha;
        $Event ->hora = $request ->hora;
         $Event ->linkFacebook = $request ->linkFacebook;  
        $Event ->mapa_idMapa = $request ->mapa_idMapa;
        $Event -> save();
        return redirect('/Eventos') ->with('success','Registro creado satisfactoriamente');
      
    }
   //-------------------------------------------------------///
    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
        $Event=Eventos::find($idEventos);
        return  view('eventos.show',compact('Event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($idEventos)
    {
        //
        $Event=Eventos::find($idEventos);
        return  view('eventos.edit',compact('Event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $idEventos)
    {
        //
        $request->validate([
           
            'Nombre'     =>  'required',
            'Descripcion'     =>  'required',
            'fecha'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
        $Event = Eventos::Find($idEventos);
        $name = $request->hidden_image;
        $file = $request->file('imagen');

  
            if ($request->hasFile('imagen')) {
                // Se toma el path de la imagen anterior y se elimina, nota
                // que es necesario usar el path relativo al sistema de archivos
                // en vez de usar el path completo del servidor, para ello es necesario
                // guardar el archivo sin usar la función asset().
              //  Storage::delete($Event->imagen);
        
          $image_path = parse_url($Event->imagen);
          $imagen1 = (public_path($image_path['path']));
         File::delete($imagen1);
                // Se guarda el nuevo archivo y se asigna a su respectivo modelo.
               // $path = $request->file('imagen')->store('/images/uploads/');
               $name = time().$file->getClientOriginalName();
               $file->move(public_path().'/images/uploads/eventos/', $name);
               $picture = URL::asset('/images/uploads/eventos/'.$name);
              /************************************** */

$thumbnailpath = public_path('images/uploads/eventos/'.$name);
$img = Image::make($thumbnailpath)->resize(960, 640)->save($thumbnailpath);
/********************************** */
              
              
               $Event->imagen = $picture;
     }

     $Event ->Nombre = $request ->Nombre;
     $Event ->Descripcion = $request ->Descripcion;
     $Event ->fecha = $request ->fecha;
     $Event ->hora = $request ->hora;
      $Event ->linkFacebook = $request ->linkFacebook;  
     $Event ->mapa_idMapa = $request ->mapa_idMapa;

     $Event->save();

    return redirect('/Eventos') ->with('success','Registro creado satisfactoriamente');



      /*  $this->validate($request,[ 'imagen', 'Nombre'=>'required', 'Descripcion'=>'required', 'fecha'=>'required','hora'=>'required','mapa_idMapa']);
        eventos::find($idEventos)->update($request->all());
        return redirect()->route('Eventos.index')->with('success','Registro actualizado satisfactoriamente');
   */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idEventos)
    {
    
         $Event = Eventos::find($idEventos);
       //-----variables
   //    $image_path = $Event->imagen;     
$image_path = parse_url($Event->imagen);
//$imagen1 = ('C:\xampp\htdocs'.($image_path['path']));

/**para imprimir ruta y ver la url */
//dd($imagen1);
/*********************** */
//File::delete
$imagen1 = (public_path($image_path['path']));
//dd($imagen1);
  File::delete($imagen1);
   Eventos::destroy($idEventos);   

       return redirect()->route('Eventos.index')->with('success','Registro eliminado satisfactoriamente');

    }

//-------------------------------------------------------------------//

}