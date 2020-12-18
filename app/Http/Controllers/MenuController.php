<?php

namespace App\Http\Controllers;

use App\Menu;
use App\SitioTuristico;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\URL;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use File;


class MenuController extends Controller
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
       // $Menus=Menu::orderBy('idMenu','DESC')->paginate();
       $buscar = $request->get('buscarpor');
       $tipo = $request->get('tipo');
 
       $Menus = Menu::buscarpor($tipo, $buscar)->orderBy('idMenu','DESC')->paginate(100);


        return view('Menu.index',compact('Menus')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Menus = Menu::all();
        return view('Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //------------------------
        $request->validate([
            'nombre'    =>  'required',
            'imagen'     =>  'required',
            'Etiqueta'     =>  'required',
            'IDDependencia'     =>  'required',
            'Orden'     =>  'required',
       
     //       'image'         =>  'required|image|max:2048'
        ]);
//---------------
        //------------------------
        $Menus=request()->except('_token');

        if ($request->hasFile('imagen')){
            $file = $request->file('imagen');
           $name = time().$file->getClientOriginalName();
       //  $name = rand() . '.'. $file->getClientOriginalName();
         $file->move(public_path().'/images/uploads/menu/', $name);
            $picture = URL::asset('/images/uploads/menu/'.$name);
     
     }else{
        if ($request->hasFile('imagen') == null) {
       $picture = null;

     }
    }
         
          //////////////
    /*      $Menus -> nombre = $request -> input('nombre');
       //  $Menus -> imagen =  URL::asset('images/'.$name);
         $Menus ->imagen =  $picture;
             $Menus -> Etiqueta = $request -> input('Etiqueta');
             $Menus -> IDDependencia = $request -> input('IDDependencia');
             $Menus -> Orden = $request -> input('Orden');
             $Menus -> sitio_idSitio = $request -> input('sitio_idSitio');*/
////////////////////////
$Menus = new Menu();
$Menus->nombre = $request->nombre;
$Menus ->imagen =  $picture;
$Menus->Etiqueta = $request->Etiqueta;
$Menus->SubEtiqueta = $request->SubEtiqueta;
$Menus->IDDependencia = $request->IDDependencia;
$Menus->Orden = $request->Orden;
$Menus->sitio_idSitio = $request->sitio_idSitio;
$Menus -> save();
 return redirect('/Menu') ->with('success','Registro creado satisfactoriamente');
           
         }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
        $Menus=Menu::find($idMenu);
        return  view('Menu.show',compact('Menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit( $idMenu)
    {
        //
        $Menus=Menu::find($idMenu);
        return  view('Menu.edit',compact('Menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMenu)
    {
        //
         //------------------------
       $request->validate([
            'nombre'    =>  'required',
         
            'Etiqueta'     =>  'required',
            'IDDependencia'     =>  'required',
            'Orden'     =>  'required',
           
     //       'image'         =>  'required|image|max:2048'
        ]);

  //----------------metodo actualizar---------------------//
        $Menus = Menu::Find($idMenu);
        $name = $request->hidden_image;
        
        $Menus ->nombre = $request->input('nombre');
        $file = $request->file('imagen');

       
            if ($request->hasFile('imagen')) {
                // Se toma el path de la imagen anterior y se elimina, nota
                // que es necesario usar el path relativo al sistema de archivos
                // en vez de usar el path completo del servidor, para ello es necesario
                // guardar el archivo sin usar la función asset().
              //  Storage::delete($Event->imagen);
        
          $image_path = parse_url($Menus->imagen);
          $imagen1 = (public_path($image_path['path']));
         File::delete($imagen1);
         
           $name = time().$file->getClientOriginalName();
         $file->move(public_path().'/images/uploads/menu/', $name);
            $picture = URL::asset('/images/uploads/menu/'.$name);
            $Menus->imagen = $picture;
     
            
        }
         
            $Menus->Etiqueta = $request->Etiqueta;
            $Menus->SubEtiqueta = $request->SubEtiqueta;
            $Menus->IDDependencia = $request->IDDependencia;
            $Menus->Orden = $request->Orden;
            $Menus->sitio_idSitio = $request->sitio_idSitio; 
            

            $Menus -> save();
        return redirect()->route('Menu.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy( $idMenu)
    {
        //
  $Menus = Menu::Find($idMenu);
    
$image_path = parse_url($Menus->imagen);
$imagen1 = (public_path($image_path['path']));
//dd($prueba);
  File::delete($imagen1);
   $Menus::destroy($idMenu);   
        
        return redirect()->route('Menu.index')->with('success','Registro eliminado satisfactoriamente');
    }

    
    public function getMenu(){
        $Menus=Menu::all();
        return response()->json($Menus);
}

}
