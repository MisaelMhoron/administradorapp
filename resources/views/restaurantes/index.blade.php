@extends('layouts.layout')
@section('content')

<!---------------------------------------------->

    <!-- Latest compiled and minified CSS -->
 

 
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
<!--------------------------------------------->
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
      <option>nombreRest</option>
   
    </select>

    <input name="buscarpor" id="uno" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
     
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  </nav>

<!---------------------------------------------->


<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de restaurantes</h3>
          </div>
          <div class="pull-right">
            <div style=" padding-right: 10px;" class="btn-group"><br>
              <a href="{{ route('restaurantes.create') }}" class="btn btn-info" style="border-radius:12px">Añadir restaurante</a>
       </div><br><br>
          </div>
          <br><br><br><br>

<div id="no-more-tables">
     <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style="text-align: center">ID </th>
             <th style="text-align: center">NOMBRE</th>
             <th style="text-align: center">DIRECCIÓN</th>
               <th style="text-align: center">IMG</th>
               <th style="text-align: center">IMG2</th>
               <th style="text-align: center">IMG3</th>
               <th>DESCRIPCIÓN</th>
               <th>FACEBOOK</th>
               <th>INSTAGRAM</th>
               <th>WHATSAPP</th>
               <th>WEB</th>
                <th>TELÉFONO</th>
               <th>MAPA</th>
               <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: cente;background-color:#FFE0BA">ELIMINAR</th>
             
             </thead>
             <tbody>
              @if($Restau->count())  
              @foreach($Restau as $Restaurant)  
              <tr>
              <div class="more">
              <td data-title="ID">{{$Restaurant->idRest}}</td>
              <td data-title="Nombre">{{$Restaurant->nombreRest}}</td>
              <td data-title="Direccion">{{$Restaurant->direccion }}</td>
              <td data-title="Imagen">
            
             <img src= "{{$Restaurant->imagen}}" class="zoom"> 
                </td>
                <td data-title="Imagen2">
              <img src= "{{$Restaurant->imagen2}}" class="zoom"> 
                </td>
                <td data-title="Imagen3">
              <img src= "{{$Restaurant->imagen3}}" class="zoom"> 
                </td>
 <!---------------------------------------------------------------->

<td data-title="Descripcion">

<button type="button" class="btn btn-info" data-toggle="modal" style=" width:100px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;"  data-target="#yourModalqr{{$Restaurant->idRest}}"><img class="img" src="images/leer.png"></i></button>
    
    @foreach ($Restau as $Rta)    
    <div class="modal fade" id="yourModalqr{{$Rta->idRest}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$Rta->nombreRest}}</h4>
          </div>
          <div class="modal-body">
           
              <textarea  name="" rows="15" cols="30" id="miid"  class="form-control input-sm" style="font-family: Arial;text-align: justify; font-size: 11pt" 
placeholder="Todavía no hay información"> {{$Rta->descripcion}}</textarea>
        
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
 <!--  <td data-title="FacebookLink">       

      <p><a href= "{{$Restaurant->facebookLink }}"><h5>{{$Restaurant->facebookLink }}<h5></a> </p>
     
    
  </p>
</div>
</td> -->

<td style="text-align: justify" data-title="facebookLink">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #3C8EFD;"  data-toggle="modal" data-target="#yourModalfb{{$Restaurant->idRest}}"><i style="color:white" class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Restau as $fb)    
    <div class="modal fade" id="yourModalfb{{$fb->idRest}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabelfb">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabelfb">{{$fb->nombreRest}}</h4>
          </div>
          <div class="modal-body">
             <p><a href= "{{$fb->facebookLink}}">{{$fb->facebookLink}}</a> </p>
         
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>
<!-------------------------------------------------------------->
<!--
<td data-title="InstagramLink">       

<p><a href= "{{$Restaurant->instagramLink }}"> <h5>{{$Restaurant->instagramLink }}</h5></a> </p>
</td>
-->

<td style="text-align: justify" data-title="instagramLink">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #FEB26B;"  data-toggle="modal" data-target="#yourModalig{{$Restaurant->idRest}}"><i style="color:white" class="fa fa-instagram fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Restau as $ig)    
    <div class="modal fade" id="yourModalig{{$ig->idRest}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$ig->nombreRest}}</h4>
          </div>
          <div class="modal-body">
<p><a href= "{{$ig->instagramLink}}">{{$ig->instagramLink}}</a> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>

<!---------------------------------------------------->
                <td data-title="Numero Tel.">{{$Restaurant->whatsappNum  }}</td>
<!---------------------------------------------------------------->

<!--
     <td data-title="Web">       

      <p><a href= "{{$Restaurant->pageWebLink }}"> <h5>{{$Restaurant->pageWebLink }}</h5></a> </p>

</td>  
-->
<td style="text-align: justify" data-title="pageWebLink">
    <button type="button" class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;background-color: #8DCAF5;"  data-toggle="modal" data-target="#yourModalwb{{$Restaurant->idRest}}"><i style="color:white" class="fa fa-link fa-2x" aria-hidden="true"></i></button>
    
    @foreach ($Restau as $web)    
    <div class="modal fade" id="yourModalwb{{$web->idRest}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel3">{{$web->nombreRest}}</h4>
          </div>
          <div class="modal-body">
           

<p><a href= "{{$web->pageWebLink}}">{{$web->pageWebLink}}</a> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>
<!---------------------------------------------------------------------->
              <td data-title="Teléfono">{{$Restaurant->telefono}}</td>
                <td data-title="Id de Mapa" >{{$Restaurant->mapa['titulo']}}</td>
          
                <td data-title="Actualizar"><a class="btn btn-primary btn-xs" href="{{action('RestaurantesController@edit', $Restaurant->idRest)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td>  
                <td data-title="Eliminar">
                  <form method= "post" action = "{{url('/restaurantes/'.$Restaurant->idRest)}}" >
                   {{csrf_field() }}
                   {{ method_field ('DELETE')}}
                   <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('¿quieres borrar?');"></i></button>             
                 
               
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
      {{ $Restau->links() }}
    </div>
  </div>
</section>

@endsection
