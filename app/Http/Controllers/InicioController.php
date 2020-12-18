<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use DB;
use Carbon\Carbon;
class InicioController extends Controller
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
    /*  $Inicios=Login::name($request->get('genero'))->orderBy('idLogin','DESC')->paginate();
      return view('login.index',compact('Inicios')); */
      /*  return view ('login.index');

    /*  $logins = Login::all();
      return view('login.todos', ['logins' => $logins->toArray()]);*/
      $edad = DB::table('login')
      ->select(DB::raw("nacionalidad , TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) AS edad"))
      ->get();
      

      $buscar = $request->get('buscarpor');

      $tipo = $request->get('tipo');

      $Inicios = Login::buscarpor($tipo, $buscar,$edad)->orderBy('idLogin','DESC')->paginate(100);
      return view('login.index', compact('Inicios'));
  
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // return view('login.create');
       $Inicios = Login::all();
       return view('Login.create');
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
                'nombreUsuario'    =>  'required',
                'nacionalidad'     =>  'required',
                'genero'     =>  'required',
                'fechaNac'     =>  'required',
                'pasword'     =>  'required',
           
         //       'image'         =>  'required|image|max:2048'
            ]);

            $Inicios = new Login();
            $Inicios->nombreUsuario = $request->nombreUsuario;
            $Inicios->nacionalidad = $request->nombreUsuario;
            $Inicios->genero = $request->nombreUsuario;
            $Inicios->fechaNac = $request->nombreUsuario;
            $Inicios->pasword = $request->nombreUsuario;
            $Inicios -> save();
        return redirect()->route('usuarios.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $login=Login::find($id);
        return  view('usuarios.show',compact('login'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $login=Login::find($id);
        return  view('login.edit',compact('login'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombreUsuario'    =>  'required',
            'nacionalidad'     =>  'required',
            'genero'     =>  'required',
            'fechaNac'     =>  'required',
            'pasword'     =>  'required',
       
     //       'image'         =>  'required|image|max:2048'
        ]);
        $login=Login::find($id);
        $Inicios = new Login();
        $Inicios->nombreUsuario = $request->nombreUsuario;
        $Inicios->nacionalidad = $request->nombreUsuario;
        $Inicios->genero = $request->nombreUsuario;
        $Inicios->fechaNac = $request->nombreUsuario;
        $Inicios->pasword = $request->nombreUsuario;
        $Inicios -> save();
      
      /*  $this->validate($request,[ 'imagen'=>'required', 'nacionalidad'=>'required', 'genero'=>'required', 'fechaNac'=>'required']);
        login::find($id)->update($request->all());*/
        return redirect()->route('usuarios.index')->with('success','Registro actualizado satisfactoriamente');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Login::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function getLogin(){
        $login=Login::all();
        return response()->json($login);
    }

}
