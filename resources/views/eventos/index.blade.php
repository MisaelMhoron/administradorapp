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

input::-webkit-datetime-edit{ color: transparent; }
input:focus::-webkit-datetime-edit{ color: #000; }
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
      <option>Nombre</option>
      <option>fecha</option>
    </select>
 <input name="buscarpor" id="uno" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
    <input type="date" class="form-control mr-sm-2" style="width:70px;height:34px" class="form-control" id="trord" onblur="document.getElementById('uno').value=this.value"/>
     
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  </nav>

<!---------------------------------------------->

<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de eventos</h3>
          </div>
          <div class="pull-right">
            <div style=" padding-right: 10px;"  class="btn-group"><br>
              <a href="{{ route('Eventos.create') }}" class="btn btn-info"style="border-radius:12px"  >Añadir Evento</a>
            </div><br><br>
          </div>
          <br><br><br><br>

<div id="no-more-tables">
  <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style="text-align: center">ID</th>
               <th style="text-align: center">IMG</th>
               <th style="text-align: center">NOMBRE</th>
               <th style="text-align: center">DESCRIPCIÓN</th>
               <th style="text-align: center">FECHA</th>
               <th style="text-align: center">HORA</th>
               <th style="text-align: center">LINK DE EVENTO</th>
               <th style="text-align: center">MAPA</th>
             
               <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: cente;background-color:#FFE0BA">ELIMINAR</th>
             </thead>
             
             <tbody class="buscar">
              @if($Event->count())  
              @foreach($Event as $Evento)  
              <tr>
              <div class="more">
              <td style="text-align: center" data-title="ID">{{$Evento->idEventos}}</td>
              <td data-title="Imagen">
        <!--      <img src= "{{ asset('images/').'/'.$Evento->imagen}}" alt ="100" width= "200"> --> 
                    
              <img src= "{{ $Evento->imagen}}" class="zoom">
   <!-- -->         
                </td>
             
               <td style="text-align: center" data-title="Nombre">{{$Evento->Nombre}}</td>
               
                <!--------------------------------------------------------------------->
               <td style="text-align: justify" data-title="Descripcion">
            <button type="button" class="btn btn-info" data-toggle="modal" style=" width:100px;
    height:35px;outline: none;border: none;margin-left: 15px;border-radius: 25px;text-align:center;"  data-target="#yourModalqr{{$Evento->idEventos}}"><img class="img" src="images/leer.png"></i></button>
    
    @foreach ($Event as $ev)    
    <div class="modal fade" id="yourModalqr{{$ev->idEventos}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$ev->Nombre}}</h4>
          </div>
          <div class="modal-body">
            {{$ev->Descripcion}}
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
                <td style="text-align: center" data-title="Fecha">{{$Evento->fecha}}</td>
                <td style="text-align: center" data-title="Hora">{{$Evento->hora}}</td>
                 <!--------------------------------------------------------------------->
   <td style="text-align: justify" data-title="Descripcion">
   <button type="button"  class="imageicono" style=" width:70px;
    height:35px;outline: none;border: none; margin-left: 30px;border-radius: 25px;text-align:center;background-color: #3C8EFD;"  data-toggle="modal" data-target="#yourModallfb{{$Evento->idEventos}}"><i style="color:white" class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></button>
    @foreach ($Event as $linkfb)    
    <div class="modal fade" id="yourModallfb{{$linkfb->idEventos}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabelfb">{{$linkfb->Nombre}}</h4>
          </div>
          <div class="modal-body">
            
            <p><a href= "{{$linkfb->linkFacebook}}">{{$linkfb->linkFacebook}}</a> </p>
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
                <td style="text-align: center" data-title="Id de mapa">{{$Evento->mapa['titulo']}}</td>
              
                <td style="text-align: center" data-title="Actualizar"><a class="btn btn-primary btn-xs" href="{{action('EventosController@edit', $Evento->idEventos)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td>  
                <td style="text-align: center" data-title="Eliminar">
                  <form method= "post" action = "{{url('/Eventos/'.$Evento->idEventos)}}" >
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
    
      {{ $Event->links() }}
    </div>
  </div>
</section>


@endsection

