<?php

namespace App\Http\Controllers;

use App\alojamiento;
use App\Mapas;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;

class AlojamientoController extends Controller
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
        //$Aloja=alojamiento::orderBy('id','DESC')->paginate();
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('tipo');
  
        $Aloja = alojamiento::buscarpor($tipo, $buscar)->orderBy('id','DESC')->paginate(100);
        return view('alojamiento.index',compact('Aloja')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Aloja = alojamiento::all();
        return view('alojamiento.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'    =>  'required',
            'direccion'     =>  'required',
            'imagen'     =>  'required',
            'descripcion'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
//----------------------------------------------------
      $Aloja=request()->except('_token');
   
        if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
           $name = time().$file->getClientOriginalName();
         $file->move(public_path().'/images/uploads/alojamiento/', $name);
            $picture = URL::asset('/images/uploads/alojamiento/'.$name);
     
     }else{
        if ($request->hasFile('imagen') == null) {
       $picture = null;

     }
    }

   if ($request->hasFile('imagen2')){
        $file2 = $request->file('imagen2');
        $name2 = time().$file2->getClientOriginalName();
        $file2->move(public_path().'/images/uploads/alojamiento/', $name2);
        $picture2 = URL::asset('/images/uploads/alojamiento/'.$name2);
 
 }
 else{
    if ($request->hasFile('imagen2') == null) {
        $picture2 = null;

 }
}
 if ($request->hasFile('imagen3')){
    $file3 = $request->file('imagen3');
    $name3 = time().$file3->getClientOriginalName();
    $file3->move(public_path().'/images/uploads/alojamiento/', $name3);
    $picture3 = URL::asset('/images/uploads/alojamiento/'.$name3);

}
else{
if ($request->hasFile('imagen3') == null) {
    $picture3 = null;

}
}
        $Aloja = new alojamiento();
        $Aloja->nombre = $request->nombre;
        $Aloja->direccion  = $request->direccion ;
        $Aloja ->imagen =  $picture;
        $Aloja ->imagen2 =  $picture2;
        $Aloja ->imagen3 =  $picture3;
        $Aloja->descripcion  = $request->descripcion ;
        $Aloja->linkFacebook  = $request->linkFacebook ;
        $Aloja->linkInstagram  = $request->linkInstagram ;
        $Aloja->linkPageWeb   = $request->linkPageWeb  ;
        $Aloja->numWhatsapp   = $request->numWhatsapp  ;
        $Aloja->telefono   = $request->telefono  ;
        $Aloja->mapa_idMapa  = $request->mapa_idMapa ;
    
$Aloja -> save();
return redirect('/alojamiento') ->with('success','Registro creado satisfactoriamente');
  
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function show(alojamiento $alojamiento)
    {
        //
        $Aloja=alojamiento::find($id);
        return  view('alojamiento.show',compact('Aloja'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
            //
            $Aloja=alojamiento::Find($id);
            return  view('alojamiento.edit',compact('Aloja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $request->validate([
            'nombre'    =>  'required',
            'direccion'     =>  'required',
        //    'imagen'     =>  'required',
            'descripcion'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);

        $Aloja=alojamiento::Find($id);
        
        $name = $request->hidden_image;
       $Aloja ->nombre = $request->input('nombre');
       $Aloja->direccion   = $request->direccion  ;
      $file = $request->file('imagen');
      $file2 = $request->file('imagen2');
      $file3 = $request->file('imagen3');
      //-------------------------------------
 if ($request->hasFile('imagen')) {
        $image_path = parse_url($Aloja->imagen);
        $imagen1 = (public_path($image_path['path']));
        File::delete($imagen1);
        
    $name = time(). $file->getClientOriginalName();
    $file->move(public_path().'/images/uploads/alojamiento/', $name);
       $picture = URL::asset('/images/uploads/alojamiento/'.$name);
       $Aloja ->imagen =  $picture;
    }
    //----------------------------
 if ($request->hasFile('imagen2')) {

        $image_path2 = parse_url($Aloja->imagen2);
        $imagen2 = (public_path($image_path2['path']));
        File::delete($imagen2);
        
        $name2 = time().$file2->getClientOriginalName();
        $file2->move(public_path().'/images/uploads/alojamiento/', $name2);
        $picture2 = URL::asset('/images/uploads/alojamiento/'.$name2);
        $Aloja ->imagen2 =  $picture2;
    
    }
    //-----------------------
  if ($request->hasFile('imagen3')) {

        $image_path3 = parse_url($Aloja->imagen3);
        $imagen3 = (public_path($image_path3['path']));
        File::delete($imagen3);
        
        $name3 = time().$file3->getClientOriginalName();
        $file3->move(public_path().'/images/uploads/alojamiento/', $name3);
        $picture3 = URL::asset('/images/uploads/alojamiento/'.$name3);
        $Aloja ->imagen3 =  $picture3;
    
    }
    //-------------------------------
    $Aloja->descripcion  = $request->descripcion ;
    $Aloja->linkFacebook  = $request->linkFacebook ;
    $Aloja->linkInstagram  = $request->linkInstagram ;
    $Aloja->linkPageWeb   = $request->linkPageWeb  ;
    $Aloja->numWhatsapp   = $request->numWhatsapp  ;
        $Aloja->telefono   = $request->telefono  ;
    $Aloja->mapa_idMapa  = $request->mapa_idMapa ;
    
    $Aloja -> save();
    return redirect('/alojamiento') ->with('success','Registro creado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
         //****** METODO ELIMINAR *************

  $Aloja=alojamiento::Find($id);
//-----variables
$image_path = parse_url($Aloja->imagen);
$imagen1 = (public_path($image_path['path']));

$image_path2 = parse_url($Aloja->imagen2);
$imagen2 = (public_path($image_path2['path']));

$image_path3 = parse_url($Aloja->imagen3);
$imagen3 = (public_path($image_path3['path']));


//----------------------------------------------------

  
 if (File::exists ($imagen1,$imagen2,$imagen3))
 {
    File::delete($imagen1,$imagen2,$imagen3);
    
 alojamiento::destroy($id);   
        return redirect()->route('alojamiento.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
}
