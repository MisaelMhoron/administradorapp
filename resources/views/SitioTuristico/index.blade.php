@extends('layouts.layout')
@section('content')


<style>

#miid::placeholder {
 
  text-align: center;
  padding-top: 30px;
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


/*------------para scroll de th--------------------- */
/*thead tr th { 
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #E9F7FE;
             font-size: 9pt; 
        }
    
        .table-responsive { 
            height:280px;
            overflow:scroll;
        }*/
</style>

<!-------------- PARA FILTRAR BUSQUEDAS -------------------------------->
<nav class="navbar navbar-light float-right">
  <form style=" padding-left: 10px;" class="form-inline">

  <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">

      <option>nombre</option>
  
    </select>

    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">

       <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
</nav>
<!---------------------------------------------->

<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de sitios turístico</h3>
          
          </div>
          <div class="pull-right" >
            <div style=" padding-right: 10px;"  class="btn-group" ><br> 
              <a href="{{ route('sitioturistico.create') }}" class="btn btn-info" style="border-radius:12px" >Añadir Sitio</a>
            </div><br><br>
          </div>
          <br><br><br><br>
<!------------------------------------>

<style>
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
</style>

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

<style>
.photos {
    width: 945px;
    height: 400px;
    margin: 100px auto;
    position:relative;
}
.photos > div {
    background-color: rgba(128, 128, 128, 0.5);
    border: 2px solid #444;
    float: left;
    height: 100px;
    margin: 5px;
    overflow: hidden;
    position: relative;
    width: 300px;
    z-index: 1;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    border-radius: 10px;
    -webkit-transform:scale(1.0);
    -moz-transform:scale(1.0);
    -ms-transform:scale(1.0);
    -o-transform:scale(1.0);
    transform:scale(1.0);
    -webkit-transition-duration: 0.5s;
    -moz-transition-duration: 0.5s;
    -ms-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    transition-duration: 0.5s;
}
.photos > div img{
    width: 100%;
}
.photos > div:hover{
    z-index: 10;
    -webkit-transform:scale(2.0);
    -moz-transform:scale(2.0);
    -ms-transform:scale(2.0);
    -o-transform:scale(2.0);
    transform:scale(2.0);
}
.photos > div div {
    background: url(../images/hover.gif) repeat scroll 0 0 transparent;
    cursor: pointer;
    height: 100%;
    left: 0;
    opacity: 0.5;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 15;
    -webkit-transition-duration: 0.5s;
    -moz-transition-duration: 0.5s;
    -ms-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    transition-duration: 0.5s;
}
.photos > div:nth-child(1):hover div {
    height: 0%;
}
.photos > div:nth-child(2):hover div {
    height: 0%;
    margin-top: 100px;
}
.photos > div:nth-child(3):hover div {
    width: 0%;
}
.photos > div:nth-child(4):hover div {
    margin-left: 300px;
    width: 0%;
}
.photos > div:nth-child(5):hover div {
    height: 0%;
    margin-left: 150px;
    margin-top: 50px;
    width: 0%;
}
.photos > div:nth-child(6):hover div {
    margin-left: 150px;
    width: 0%;
}
.photos > div:nth-child(7):hover div {
    height: 0%;
    margin-left: 150px;
    margin-top: 50px;
    width: 0%;
    -webkit-transform: rotateX(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(-360deg);
    transform: rotate(-360deg);
}
.photos > div:nth-child(8):hover div {
    height: 0%;
    margin-left: 150px;
    margin-top: 50px;
    width: 0%;
    -webkit-transform: rotateZ(600deg);
    -moz-transform: rotateZ(600deg);
    -ms-transform: rotateZ(600deg);
    -o-transform: rotateZ(600deg);
    transform: rotateZ(600deg);
}
.photos > div.pair div {
    width: 50%;
}
.photos > div.pair div:nth-child(odd) {
    margin-left: 150px;
}
.photos > div.pair:hover div {
    width: 0%;
}
.photos > div.pair:hover div:nth-child(odd) {
    margin-left: 300px;

}
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


<!------------------------------------>
       <div id="no-more-tables">
       <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style="text-align: center">ID </th>
             <th style="text-align: center">NOMBRE</th>
               <th style="text-align: center">IMG</th>
               <th style="text-align: center">IMG 2</th>
               <th style="text-align: center">IMG 3</th>
               <th style="text-align: center">IMG QR</th>
               <th style="text-align: center">TEXTO</th>
               <th style="text-align: center">TEXTO QR</th>
               <th style="text-align: center">CODE QR</th>
               <th style="text-align: center">MAPA</th>
               <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: center;background-color:#FFE0BA">ELIMINAR</th>
             
             </thead>
           <tbody >
              @if($Sitio->count())  
              @foreach($Sitio as $SitiosTur)  
              <tr>
              <div class="more">
              <td style="text-align: center" data-title="ID">{{$SitiosTur->idsitioturistico}}</td>
              <td style="text-align: center" data-title="Nombre">{{$SitiosTur->nombre}}</td>
              <td  data-title="Imagen">
            
             <img src= "{{$SitiosTur->imagen}}" class="zoom"> 
                </td>
                <td data-title="Imagen2">
              <img src= "{{$SitiosTur->imagen2}}" class="zoom"> 
                </td>
                <td data-title="Imagen3">
              <img src= "{{$SitiosTur->imagen3}}" class="zoom"> 
                </td>
                <td data-title="ImagenQR">
              <img src= "{{$SitiosTur->imgQR}}" class="zoom"> 
                </td>
 <!---------------------------------------------------------------->
 <td style="text-align: justify" data-title="Texto">
    <button type="button" class="btn btn-info" style=" width:100px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;"  data-toggle="modal" data-target="#yourModal{{$SitiosTur->idsitioturistico}}"><img class="img" src="images/leer.png"></button>
    
    @foreach ($Sitio as $t)    
    <div class="modal fade" id="yourModal{{$t->idsitioturistico}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{$t->nombre}}</h4>
          </div>
          <div class="modal-body">
              <textarea  name="" rows="15" cols="30" id="miid"  class="form-control input-sm" style="font-family: Arial;text-align: justify; font-size: 11pt" 
placeholder="Todavía no hay información histórica relacionada a este sitio"> {{$t->texto}}</textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
          </div>
        </div>
      </div>
    </div>
@endforeach
</td>
 <!----------------------------------------------------------------> 
 <td style="text-align: justify" data-title="TextoQR">
<button type="button" class="btn btn-info" data-toggle="modal" style=" width:100px;
    height:35px;outline: none;border: none;border-radius: 25px;text-align:center;"  data-target="#yourModalqr{{$SitiosTur->idsitioturistico}}"><img class="img" src="images/leer.png"></i></button>
    
    @foreach ($Sitio as $qr)    
    <div class="modal fade" id="yourModalqr{{$qr->idsitioturistico}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">{{$qr->nombre}}</h4>
          </div>
          <div class="modal-body">
         <textarea  name="" rows="15" cols="30" id="miid"  class="form-control input-sm" style="font-family: Arial;text-align: justify; font-size: 11pt" 
placeholder="Todavía no hay información histórica relacionada a este sitio, para mostrar con código QR">{{$qr->textoQR}}</textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
@endforeach
      </td> 
  <!----------------------------------------------------------------> 
                
                
                <td style="text-align: center" data-title="CodeQR">{{$SitiosTur->codeQR}}</td>
                <td style="text-align: center" data-title="Mapa" > {{$SitiosTur->mapa['titulo']}}</td>
           
                <td style="text-align: center" data-title="Editar"><a class="btn btn-primary btn-xs" href="{{action('SitioTuristicoController@edit', $SitiosTur->idsitioturistico)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td>  
                <td style="text-align: center" data-title="Eliminar">
                  <form method= "post" action = "{{url('/sitioturistico/'.$SitiosTur->idsitioturistico)}}" > 
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
      {{ $Sitio->links() }}
    </div>
  </div>
</section>

@endsection
