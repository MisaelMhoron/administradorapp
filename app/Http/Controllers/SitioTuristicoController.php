<?php

namespace App\Http\Controllers;

use App\SitioTuristico;
use App\Menu;
use App\Mapas; #Modelo de donde traigo los datos
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;


class SitioTuristicoController extends Controller
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
    public function cortar_string($string, $largo) {
        $marca = "|";
        if (strlen($string) > $largo) {
            $string = wordwrap($string, $largo, $marca);
            $string = explode($marca, $string);
            $string = $string[0];
            return $string . '...';
        }
        return $string;
    }
     
     
    public function index(Request $request)
    {
        //
     
/*  $Sitio=SitioTuristico::orderBy('idsitioturistico','DESC')->paginate();
   
    // $Sitio=SitioTuristico::name($request->get('nombre'))->orderBy('idsitioturistico','ASC')->paginate();
        return view('SitioTuristico.index',compact('Sitio')); */

        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');
  
        $Sitio = SitioTuristico::buscarpor($tipo, $buscar)->orderBy('idsitioturistico','DESC')->paginate(100);
        return view('SitioTuristico.index',compact('Sitio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //+
        $Sitio = SitioTuristico::all();
        return view('SitioTuristico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   
        {
             $this->validate($request,
            [
                'nombre'    =>  'required',
                'texto'     =>  'required',
                'imagen'     =>  'required',
                
                 'imgQR' => 'required_with:textoQR,codeQR',
                'textoQR' => 'required_with:imgQR,codeQR',
                'codeQR' => 'required_with:textoQR,imgQR'
            ]);

        if(isset($request->codeQR))
        {
            $this->validate($request,
                [
                    'codeQR' => 'unique:sitioturistico,codeQR', 
                ]);
        }
//----------------------------------------------------
          $Sitio=request()->except('_token');
       
            if ($request->hasFile('imagen')){
           $file = $request->file('imagen');
//obtenemos el nombre del archivo
$name = time(). $file->getClientOriginalName();
//indicamos que queremos guardar un nuevo archivo en el disco local
$file->move(public_path().'/images/uploads/sitiosturistico/', $name);
$picture = URL::asset('/images/uploads/sitiosturistico/'.$name);
         }else{
            if ($request->hasFile('imagen') == null) {
           $picture = null;

         }
        }

       if ($request->hasFile('imagen2')){
$file2 = $request->file('imagen2');
//obtenemos el nombre del archivo
$name2 = time().$file2->getClientOriginalName();
//indicamos que queremos guardar un nuevo archivo en el disco local
$file2->move(public_path().'/images/uploads/sitiosturistico/', $name2);
$picture2 = URL::asset('/images/uploads/sitiosturistico/'.$name2);
     
     }
     else{
        if ($request->hasFile('imagen2') == null) {
            $picture2 = null;

     }
    }
     if ($request->hasFile('imagen3')){
$file3 = $request->file('imagen3');
//obtenemos el nombre del archivo
$name3 =time().$file3->getClientOriginalName();
//indicamos que queremos guardar un nuevo archivo en el disco local
$file3->move(public_path().'/images/uploads/sitiosturistico/', $name3);
$picture3 = URL::asset('/images/uploads/sitiosturistico/'.$name3);
 
 }
 else{
    if ($request->hasFile('imagen3') == null) {
        $picture3 = null;

 }
}

if ($request->hasFile('imgQR')){
$file4 = $request->file('imgQR');
//obtenemos el nombre del archivo
$name4 =time(). $file4->getClientOriginalName();
//indicamos que queremos guardar un nuevo archivo en el disco local
$file4->move(public_path().'/images/uploads/sitiosturistico/', $name4);
$picture4 = URL::asset('/images/uploads/sitiosturistico/'.$name4);

}
else{
if ($request->hasFile('imgQR') == null) {
    $picture4 = null;

}
}

            $Sitio = new SitioTuristico();
            $Sitio->nombre = $request->nombre;
            $Sitio ->imagen =  $picture;
            $Sitio ->imagen2 =  $picture2;
            $Sitio ->imagen3 =  $picture3;
            $Sitio ->imgQR =  $picture4;
            $Sitio->texto = $request->texto;
            $Sitio->textoQR = $request->textoQR;
            $Sitio->codeQR = $request->codeQR;
            $Sitio->mapa_idMapa = $request->mapa_idMapa;
        
    $Sitio -> save();
    return redirect('/sitioturistico') ->with('success','Registro creado satisfactoriamente');
      
                }
    /**
     * Display the specified resource.
     *
     * @param  \App\SitioTuristico  $sitioTuristico
     * @return \Illuminate\Http\Response
     */
    public function show( $idsitioturistico)
    {
          //
          $Sitio=SitioTuristico::find($idsitioturistico);
          return  view('SitioTuristico.show',compact('Sitio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SitioTuristico  $sitioTuristico
     * @return \Illuminate\Http\Response
     */
    public function edit( $idsitioturistico)
    {
        //
        $Sitio=SitioTuristico::Find($idsitioturistico);
        return  view('SitioTuristico.edit',compact('Sitio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SitioTuristico  $sitioTuristico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idsitioturistico)
    {
         $this->validate($request,
        [
            'nombre'    =>  'required',
            'texto'     =>  'required',
            
           'imgQR' => 'required_with:textoQR,codeQR',
                'textoQR' => 'required_with:imgQR,codeQR',
                'codeQR' => 'required_with:textoQR,imgQR'
        ]);

    if(isset($request->codeQR))
    {
        $this->validate($request,
            [
                'codeQR' => 'unique:sitioturistico,codeQR,'. $idsitioturistico.',idsitioturistico',
            ]);
    }


   //----------------metodo actualizar---------------------//
$Sitio = SitioTuristico::Find($idsitioturistico);

$name = $request->hidden_image;

$Sitio ->nombre = $request->input('nombre');

$file = $request->file('imagen');
$file2 = $request->file('imagen2');
$file3 = $request->file('imagen3');
$file4 = $request->file('imgQR');
//-------------------------------------
 if ($request->hasFile('imagen')) {

        $image_path = parse_url($Sitio->imagen);
        $imagen1 = (public_path($image_path['path']));
        File::delete($imagen1);
        
$name = time().$file->getClientOriginalName();
$file->move(public_path().'/images/uploads/sitiosturistico/', $name);
   $picture = URL::asset('/images/uploads/sitiosturistico/'.$name);
   $Sitio ->imagen =  $picture;
}
//----------------------------
 if ($request->hasFile('imagen2')) {

        $image_path2 = parse_url($Sitio->imagen2);
        $imagen2 = (public_path($image_path2['path']));
        File::delete($imagen2);
   // $file2 = $request->file('imagen2');
   
    $name2 = time().$file2->getClientOriginalName();
    $file2->move(public_path().'/images/uploads/sitiosturistico/', $name2);
    $picture2 = URL::asset('/images/uploads/sitiosturistico/'.$name2);
    $Sitio ->imagen2 =  $picture2;

}
//-----------------------
 if ($request->hasFile('imagen3')) {

        $image_path3 = parse_url($Sitio->imagen3);
        $imagen3 = (public_path($image_path3['path']));
        File::delete($imagen3);
    
    $name3 = time().$file3->getClientOriginalName();
    $file3->move(public_path().'/images/uploads/sitiosturistico/', $name3);
    $picture3 = URL::asset('/images/uploads/sitiosturistico/'.$name3);
    $Sitio ->imagen3 =  $picture3;

}
//-------------------------------
 if ($request->hasFile('imgQR')) {

        $image_path4 = parse_url($Sitio->imgQR);
        $imagen4 = (public_path($image_path4['path']));
        File::delete($imagen4);
    
    $name4 = time().$file4->getClientOriginalName();
    $file4->move(public_path().'/images/uploads/sitiosturistico/', $name4);
    $picture4 = URL::asset('/images/uploads/sitiosturistico/'.$name4);
    $Sitio ->imgQR =  $picture4;

}
//-------------------------------
   $Sitio->texto = $request->texto;
   $Sitio->textoQR = $request->textoQR;
   $Sitio->codeQR = $request->codeQR;
   $Sitio->mapa_idMapa = $request->mapa_idMapa;
//--------------------------------- 
  
  $Sitio -> save();
   return redirect('/sitioturistico') ->with('success','Registro creado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SitioTuristico  $sitioTuristico
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idsitioturistico)
    {
      

  //****** METODO ELIMINAR *************

  $Sitio = SitioTuristico::find($idsitioturistico);
//-----variables
$image_path = parse_url($Sitio->imagen);
$imagen1 = (public_path($image_path['path']));

$image_path2 = parse_url($Sitio->imagen2);
$imagen2 = (public_path($image_path2['path']));

$image_path3 = parse_url($Sitio->imagen3);
$imagen3 = (public_path($image_path3['path']));

$image_path4 = parse_url($Sitio->imgQR);
$imgQR = (public_path($image_path4['path']));
//----------------------------------------------------

  
 if (File::exists ($imagen1,$imagen2,$imagen3,$imgQR ))
 {
    File::delete($imagen1,$imagen2,$imagen3,$imgQR );
    
    SitioTuristico::destroy($idsitioturistico);        
    return redirect()->route('sitioturistico.index')->with('success','Registro eliminado satisfactoriamente');
 } 


     
}
//************ FUNCION OBTENER JSON ************************************ */
    public function getSitio(){
        $Sitio=SitioTuristico::all();
        return response()->json($Sitio);

      /*  $Sitio = SitioTuristico::all();
        $Menus= Menu::all();
      
        return Response::json(
            array(
                'menu' => $Sitio,
                'sitioturistico' => $Menus

            ),200);*/

}
}

