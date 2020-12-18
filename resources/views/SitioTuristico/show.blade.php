<!--
<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Datos de usuario </title>
 </head>
 <body>
    <h1> {{ $Sitio->real_name }} </h1>
    <ul>
       <li> Nombre de usuario: {{ $Sitio->nombre }} </li>
      
    </ul>
   
 </body>
</html> -->
@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
<div  class="col-md-6 col-md-offset-3">
		
<div class="panel panel-primary">
      <div class="panel-heading">DESCRIPCIÓN DEL SITIO TURISTICO</div>
      <div class="panel-body">
	  
       <h4>DESCRIPCIÓN DEL SITIO TURÍSTICO</h4>
	  <li> {{ $Sitio->texto }} </li> <br>
	  <h4>DESCRIPCIÓN DEL SITIO TURÍSTICO PARA MOSTRAR EN EL QR</h4>
	   <li style="text-align:justified">{{ $Sitio->textoQR }} </li>
	   </div>
				</div>

			</div>
		</div>
	</section>
@endsection	
