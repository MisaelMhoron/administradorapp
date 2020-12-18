@extends('layouts.layout')
@section('content')

<!-- llamamos la librería jquery  desde sus cdn Hosted--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- llamamos al jquery.expander.js mira sus archivos de descarga-->
<script src="jquery.expander.js"></script>
<!--codigo javascript para su configuración o efecto de un solo llamado por defecto-->

<style>
#miid::placeholder {
 
  text-align: center;
  padding-top: 30px;
}
  .imageicono:hover{

color:rgb(2, 140, 62 );opacity:0.8;
   
     cursor: pointer;
   }
  /*********para scroll boostrap */
  .tableFixHead          { overflow-y: auto; height: 500px; }
.tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px;font-size: 10pt;  }
th     {  background-color: #DEEFEF;
  text-align: center;}


/********************************** */
.pull-left {
  float: left !important;
}
.pull-right {
  float: right !important;
}
 .more {
  cursor: pointer;
  background-color: #ccf;
}

.complete {
  display: none;
}
h5{
  padding: -1em;
 width: 5em;
 overflow-wrap: break-word;

}



/*********************************** */
@media only screen and (max-width: 800px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}

/********************************* */
/*************pra zoom de imagen******************** */
img.zoom {
    width: 60px;
 

    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;

}
 
.transition {
    -webkit-transform: scale(3.8); 
    -moz-transform: scale(3.8);
    -o-transform: scale(3.8);
    transform: scale(3.8);
    border: 1px solid white;
 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.zoom').hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });
});
</script>

<script>
  $(document).ready(function() {
  $(".more").on("click", function() {
    // cambiar la visibilidad de complete
    $(".complete").toggle();

    // cambiar el texto del boton dependiendo del texto actual
    if ($(this).text() == "Leer menos...") {
      $(this).text("Leer mas...");
    } else {
      $(this).text("Leer menos...");
    }
  });
});
</script>

<!-------------- PARA FILTRAR BUSQUEDAS -------------------------------->
<nav class="navbar navbar-light float-right">
  <form class="form-inline">
  <select name="tipo"  class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Nombre</option>
    </select>

    <input name="buscarpor" id="uno" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  </nav>

<!---------------------------------------------->
<div class="panel panel-primary">
				<div class="panel-heading">
        <h3 class="panel-title">Listado de alojamientos</h3>
       </div> 
          <div class="pull-right">
            <div style=" padding-right: 10px;"  class="btn-group"><br>
              <a href="{{ route('alojamiento.create') }}" class="btn btn-info" style="border-radius:12px"  >Añadir alojamiento</a>
            </div><br><br>
          </div>
    <br><br><br><br>

          <div id="no-more-tables">
         <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
        			
             <th>ID</th>
             <th>NOMBRE</th>
             <th>DIRECCIÓN</th>
               <th>IMG 1</th>
               <th>IMG 2</th>
               <th>IMG 3</th>
               <th>DESCRIPCIÓN</th>
               <th>FACEBOOK</th>
               <th>INSTAGRAM</th>
               <!--
               <th ><div align="center"><img  src="dist/img/fb.png" alt ="40" width= "40"></div> </th>
               <th ><div align="center"><img  src="dist/img/instagram.png" alt ="40" width= "40"></div> </th>-->
               <th>WEB</th>
               <th>WHATSAPP</th>
                <th>TELÉFONO</th>
               <th >MAPA</th>
            
               <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: cente;background-color:#FFE0BA">ELIMINAR</th>
             </thead>
             <tbody class="buscar">
              @if($Aloja->count())  
              @foreach($Aloja as $AlojaMien)  
              <tr>
              <div class="more">
              <td data-title="ID">{{$AlojaMien->id}}</td>
              <td data-title="nombre">{{$AlojaMien->nombre}}</td>
              <td data-title="direccion"> {{$AlojaMien->direccion }}</td>
              <td data-title="imagen"> 
             <img src= "{{$AlojaMien->imagen}}" class="zoom"> 
                </td>
                <td data-title="imagen2">
              <img src= "{{$AlojaMien->imagen2}}" class="zoom"> 
                </td>
                <td data-title="imagen3">
              <img src= "{{$AlojaMien->imagen3}}" class="zoom"> 
                </td>
 <!---------------------------------------------------------------->

<td data-title="Descripcion">
<button type="button" class="btn btn-info" data-toggle="modal" style=" width:100px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;"  data-target="#yourModalqr{{$AlojaMien->id}}"><img class="img" src="images/leer.png"></i></button>
    
    @foreach ($Aloja as $Alm)    
    <div class="modal fade" id="yourModalqr{{$Alm->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$Alm->nombre}}</h4>
          </div>
          <div class="modal-body">
              <textarea  name="" rows="10" cols="20" id="miid"  class="form-control input-sm" style="font-family: Arial;text-align: justify; font-size: 11pt" 
placeholder="Todavía no hay información"> {{$Alm->descripcion}}</textarea>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>   
       
 <!--------------------------------------------------------------------->
 <!--
               <td data-title="Facebook">
            <p><a href= "{{$AlojaMien->linkFacebook }}"> <h5>{{$AlojaMien->linkFacebook }}</h5></a> </p>
               </td>
               -->
               <td style="text-align: justify" data-title="Facebook">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #3C8EFD;"  data-toggle="modal" data-target="#yourModalfb{{$AlojaMien->id}}"><i style="color:white" class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Aloja as $fb)    
    <div class="modal fade" id="yourModalfb{{$fb->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabelfb">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabelfb">{{$fb->nombre}}</h4>
          </div>
          <div class="modal-body">
           
 <p><a href= " {{$fb->linkFacebook}}">  {{$fb->linkFacebook}}</a> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>
 <!-- ------------------------------------------------------------------- -->              
              <!--  <td data-title="Instagram">
                    <p><a href= "{{$AlojaMien->linkInstagram }}"> <h5>{{$AlojaMien->linkInstagram }}</h5></a> </p>
              
                </td>
                -->
                <td style="text-align: justify" data-title="Instagram">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #FEB26B;"  data-toggle="modal" data-target="#yourModalig{{$AlojaMien->id}}"><i style="color:white" class="fa fa-instagram fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Aloja as $ig)    
    <div class="modal fade" id="yourModalig{{$ig->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$ig->nombre}}</h4>
          </div>
          <div class="modal-body">
          
 <p><a href= "{{$ig->linkInstagram}}"> {{$ig->linkInstagram}}</a> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>

<!-- -------------------------------------------------------------------- -->
          <!--      <td data-title="PaginaWeb">
                
                   <p><a href= "{{$AlojaMien->linkPageWeb }}"> <h5>{{$AlojaMien->linkPageWeb }}</h5></a> </p>
                 </td>
                 -->
                 <td style="text-align: justify" data-title="pageWebLink">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #8DCAF5;"  data-toggle="modal" data-target="#yourModalwb{{$AlojaMien->id}}"><i style="color:white" class="fa fa-link fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Aloja as $web)    
    <div class="modal fade" id="yourModalwb{{$web->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel3">{{$web->nombre}}</h4>
          </div>
          <div class="modal-body">
         

 <p><a href= "{{$web->linkPageWeb}}">{{$web->linkPageWeb}}</a> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>
<!-- ------------------------------------------------------------------------ -->
                <td data-title="Whatsapp">{{$AlojaMien->numWhatsapp }}</td>
                    <td data-title="Número Tel.">{{$AlojaMien->telefono }}</td>
                <td data-title="Id de mapa"> {{$AlojaMien->mapa['titulo']}}</td>
                <td data-title="Actualizar"><a class="btn btn-primary btn-xs" href="{{action('AlojamientoController@edit', $AlojaMien->id)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td> 
                <td data-title="Eliminar">
                  <form method= "post" action = "{{url('/alojamiento/'.$AlojaMien->id)}}" >
                   {{csrf_field() }}
                   {{ method_field ('DELETE')}}
                   <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true"  onclick="return confirm('¿quieres borrar?');"></i></button>             
                 
               
                </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $Aloja->links() }}
    </div>
  </div>
</section>

@endsection
