<?php

namespace App\Http\Controllers;

use App\Restaurantes;
use App\Mapas; #Modelo de donde traigo los datos
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;

class RestaurantesController extends Controller
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
       // $Restau=Restaurantes::orderBy('idRest','DESC')->paginate();
       $buscar = $request->get('buscarpor');
       $tipo = $request->get('tipo');
 
       $Restau = Restaurantes::buscarpor($tipo, $buscar)->orderBy('idRest','DESC')->paginate(100);
        return view('restaurantes.index',compact('Restau')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Restau = Restaurantes::all();
        return view('restaurantes.create');

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
            'nombreRest'    =>  'required',
            'direccion'     =>  'required',
            'imagen'     =>  'required',
            'descripcion'     =>  'required',
     //       'image'         =>  'required|image|max:2048'
        ]);
//----------------------------------------------------
$Restau=request()->except('_token');
   
if ($request->hasFile('imagen')){
    
    $file = $request->file('imagen');
   $name = time().$file->getClientOriginalName();
 $file->move(public_path().'/images/uploads/restaurantes/', $name);
    $picture = URL::asset('/images/uploads/restaurantes/'.$name);

}else{
if ($request->hasFile('imagen') == null) {
$picture = null;

}
}

if ($request->hasFile('imagen2')){
    
$file2 = $request->file('imagen2');
$name2 = time().$file2->getClientOriginalName();

$file2->move(public_path().'/images/uploads/restaurantes/', $name2);
$picture2 = URL::asset('/images/uploads/restaurantes/'.$name2);

}
else{
if ($request->hasFile('imagen2') == null) {
$picture2 = null;

}
}
if ($request->hasFile('imagen3')){
$file3 = $request->file('imagen3');
$name3 = time().$file3->getClientOriginalName();
$file3->move(public_path().'/images/uploads/restaurantes/', $name3);
$picture3 = URL::asset('/images/uploads/restaurantes/'.$name3);

}
else{
if ($request->hasFile('imagen3') == null) {
$picture3 = null;

}
}
$Restau = new Restaurantes();
$Restau->nombreRest = $request->nombreRest;
$Restau->direccion  = $request->direccion ;
$Restau ->imagen =  $picture;
$Restau ->imagen2 =  $picture2;
$Restau ->imagen3 =  $picture3;
$Restau->descripcion  = $request->descripcion ;
$Restau->facebookLink  = $request->facebookLink ;
$Restau->instagramLink  = $request->instagramLink ;
$Restau->whatsappNum   = $request->whatsappNum  ;
$Restau->pageWebLink   = $request->pageWebLink  ;
$Restau->mapa_idMapa  = $request->mapa_idMapa ;
$Restau->telefono  = $request->telefono ;

$Restau -> save();
return redirect('/restaurantes') ->with('success','Registro creado satisfactoriamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurantes $restaurantes)
    {
        //
        $Restau=Restaurantes::find($idRest);
        return  view('restaurantes.show',compact('Restau'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function edit( $idRest)
    {
        $Restau=Restaurantes::find($idRest);
        return  view('restaurantes.edit',compact('Restau'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idRest)
    {
        //
        $request->validate([
            'nombreRest'    =>  'required',
            'direccion'     =>  'required',
        //    'imagen'     =>  'required',
            'descripcion'     =>  'required',
            ]);

            $Restau=Restaurantes::Find($idRest);

            $name = $request->hidden_image;
           $Restau ->nombreRest = $request->input('nombreRest');
           $Restau->direccion   = $request->direccion  ;
          $file = $request->file('imagen');
          $file2 = $request->file('imagen2');
          $file3 = $request->file('imagen3');
          //-------------------------------------
    if ($request->hasFile('imagen')) {

        $image_path = parse_url($Restau->imagen);
        $imagen1 = (public_path($image_path['path']));
        File::delete($imagen1);
        
        $name = time(). $file->getClientOriginalName();
        $file->move(public_path().'/images/uploads/restaurantes/', $name);
           $picture = URL::asset('/images/uploads/restaurantes/'.$name);
           $Restau ->imagen =  $picture;
        }
        //----------------------------
     if ($request->hasFile('imagen2')) {

        $image_path2 = parse_url($Restau->imagen2);
        $imagen2 = (public_path($image_path2['path']));
        File::delete($imagen2);
        
            $name2 = time().$file2->getClientOriginalName();
            $file2->move(public_path().'/images/uploads/restaurantes/', $name2);
            $picture2 = URL::asset('/images/uploads/restaurantes/'.$name2);
            $Restau ->imagen2 =  $picture2;
        
        }
        //-----------------------
     if ($request->hasFile('imagen3')) {

        $image_path3 = parse_url($Restau->imagen3);
        $imagen3 = (public_path($image_path3['path']));
        File::delete($imagen3);
        
            $name3 = time().$file3->getClientOriginalName();
            $file3->move(public_path().'/images/uploads/restaurantes/', $name3);
            $picture3 = URL::asset('/images/uploads/restaurantes/'.$name3);
            $Restau ->imagen3 =  $picture3;
        
        }
        //-------------------------------
 $Restau->descripcion  = $request->descripcion ;
$Restau->facebookLink  = $request->facebookLink ;
$Restau->instagramLink  = $request->instagramLink ;
$Restau->whatsappNum   = $request->whatsappNum  ;
$Restau->pageWebLink   = $request->pageWebLink  ;
$Restau->mapa_idMapa  = $request->mapa_idMapa ;
$Restau->telefono  = $request->telefono ;
$Restau -> save();
return redirect('/restaurantes') ->with('success','Registro creado satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurantes  $restaurantes
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idRest)
    {
        //
       //****** METODO ELIMINAR *************

 $Restau=Restaurantes::Find($idRest);
//-----variables
$image_path = parse_url($Restau->imagen);
$imagen1 = (public_path($image_path['path']));

$image_path2 = parse_url($Restau->imagen2);
$imagen2 = (public_path($image_path2['path']));

$image_path3 = parse_url($Restau->imagen3);
$imagen3 = (public_path($image_path3['path']));


//----------------------------------------------------

  
 if (File::exists ($imagen1,$imagen2,$imagen3))
 {
    File::delete($imagen1,$imagen2,$imagen3);
    
    Restaurantes::destroy($idRest);   

        return redirect()->route('restaurantes.index')->with('success','Registro eliminado satisfactoriamente');
    }
    
    
    
    } 
    public function getRestaurante(){
        $Restau=Restaurantes::all();
        return response()->json($Restau);

      /*  $Sitio = SitioTuristico::all();
        $Menus= Menu::all();
      
        return Response::json(
            array(
                'menu' => $Sitio,
                'sitioturistico' => $Menus

            ),200);*/

}
}
