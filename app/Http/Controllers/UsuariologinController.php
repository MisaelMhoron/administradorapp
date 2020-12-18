<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

class UsuariologinController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
 /*      $login= Login::insert([
   'nombreUsuario' => $request->input('TextInputNombreUsuario'),
   'pasword' => $request->input('TextInputPassword'),
   'nacionalidad' => $request->input('TextInputNacionalidad'),
   'genero' => $request->input('TextInputGenero'),
   'fechaNac' => $request->input('TextInputFechaNac'),
  // 'created_at' => $request->input('created_at'),

       ]);

       $response['message'] = "Guardo exitosamente";
       $response['success'] = true;
 
       return response()->json($login);*/

       $login=request()->except('_token');
       $login = new Login();
       $login ->nombreUsuario = $request ->nombreUsuario;
       $login ->pasword = $request ->pasword;
       $login ->nacionalidad = $request ->nacionalidad;
       $login ->genero = $request ->genero;
       $login ->fechaNac = $request ->fechaNac;
       $login ->created_at = $request ->created_at;
       
       $response['message'] = "Guardo exitosamente";
       $response['success'] = true;
 
       return response()->json($login);

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

        $userlogin=new Login($request->all());
        $userlogin->save();
        return response()->json($request->all(),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuariologin  $usuariologin
     * @return \Illuminate\Http\Response
     */
    public function show(usuariologin $usuariologin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuariologin  $usuariologin
     * @return \Illuminate\Http\Response
     */
    public function edit(usuariologin $usuariologin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuariologin  $usuariologin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuariologin $usuariologin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuariologin  $usuariologin
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuariologin $usuariologin)
    {
        //
    }
}
