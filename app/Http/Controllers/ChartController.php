<?php

namespace App\Http\Controllers;

use App\Login;
use App\Eventos;
use App\Favoritos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class ChartController extends Controller
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
    public function index()
    {
//--**************PARA GRAFICA POR GENERO************************//
     $data = DB::table('login')
       ->select(
        DB::raw('genero as genero'), DB::raw('count(*) as number'))
      
        ->groupBy('genero')
       ->get();
    //   dd($data);
     $array[] = ['genero', 'number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->genero, $value->number];
     }
//-------------- PARA GRÁFICA POR RANGO DE EDADES************* */

$pastel = \DB::table("login")
->select (
   DB::raw('(CASE 
WHEN TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) < "10" THEN "menor de 10" 
WHEN TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) < "20" THEN "entre 10 y 19" 
WHEN TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) < "30" THEN "entre 20 y 29" 
WHEN TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) < "40" THEN "entre 30 y 39"
WHEN TIMESTAMPDIFF(YEAR,FechaNac,CURDATE()) < "50" THEN "entre 40 y 49"  
ELSE "más de 50" END) AS
 grupos'),DB::raw('count(*) as number'))
 ->groupBy('grupos') 
->get();

//dd($pastel);

//-- ****************PARA GRAFICA DE ASISTENCIAS******************************* */
$datasis = DB::table('favoritos')
->select(
    DB::raw('Nombre'), DB::raw('count(*) as number'))
->join('eventos','favoritos.idEventos','eventos.idEventos')
->groupBy('Nombre') 
->get();
    
//dd($datasis);

//-- ************************************************************************** */

return view('graficas.grafica')->with('gender', json_encode($array))->with(['pastel'=>$pastel])->with(['datasis'=>$datasis]);
    
    }

    public function graficafecha()
    {
/*
 $pastel = Login::
  select ('genero','idLogin') ->get();

  return view('graficas.grafica',['pastel'=>$pastel]);
  */
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
