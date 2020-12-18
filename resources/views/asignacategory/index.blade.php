@extends('layouts.layout')
@section('content')
<!---------------------------------------------->

    <!-- Latest compiled and minified CSS -->
 

 
    <style>
    
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
</style>

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
<script>
$(document).ready(function () {
 
 (function ($) {

     $('#filtrar').keyup(function () {

          var rex = new RegExp($(this).val(), 'i');

          $('.buscar tr').hide();

          $('.buscar tr').filter(function () {
            return rex.test($(this).text());
          }).show();

     })

 }(jQuery));

});
</script>
<nav class="navbar navbar-light float-right">
  <form class="form-inline">
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
  <input id="filtrar" type="text" class="form-control" placeholder="">
</div>
  </form>
</nav>
<!---------------------------------------------->
<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de asignaciones categorias</h3>
          </div>
          <div class="pull-right">
            <div style=" padding-right: 10px;"  class="btn-group"><br>
              <a href="{{ route('asignacategory.create') }}" class="btn btn-info" style="border-radius:12px"  >Agregar Asignacion Categoria</a>
            </div><br><br>
          </div>
          <br><br><br><br>

<div id="no-more-tables">
    <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style="text-align:center">ID</th>
             <th style="text-align:center" >CATEGORIA</th>
        
             <th style="text-align:center" >EVENTO</th>
           
             <th  style="text-align:center" >FECHA</th>
             <th  style="text-align:center" >HORA</th>
             <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: cente;background-color:#FFE0BA">ELIMINAR</th>
             </thead>
             <tbody  class="buscar">
              @if($AsiCategory->count())  
              @foreach($AsiCategory as $asigca)  
              <tr>
              <div class="more">
              <td style="text-align:center" data-title="ID">{{$asigca->idAsignacionesCat}}</td>
              <td style="text-align:center" data-title="IdCategorias" > {{$asigca->category['Categoria']}}</td>
           
              <td style="text-align:center" data-title="IdEventos" >{{$asigca->eventos['Nombre']}}</td> 
              <td style="text-align:center" data-title="Fecha de Evento">{{$asigca->eventos['fecha']}}</td> 
              <td  style="text-align:center"   data-title="Hora de Evento">{{$asigca->eventos['hora']}}</td> 
                <td  style="text-align:center"  data-title="Actualizar"><a class="btn btn-primary btn-xs" href="{{action('AsignacionescategoryController@edit', $asigca->idAsignacionesCat)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td> 
                <td  style="text-align:center" data-title="Eliminar">
                  <form method= "post" action = "{{url('/asignacategory/'.$asigca->idAsignacionesCat)}}" >
                   {{csrf_field() }}
                   {{ method_field ('DELETE')}}
                   <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('¿quieres borrar?');"></i></button>             
                 
               
                </form>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="9">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $AsiCategory->links() }}
    </div>
  </div>
</section>

@endsection
