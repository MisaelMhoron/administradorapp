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
<nav class="navbar navbar-light float-right">
  <form class="form-inline">
  <select name="tipo"  class="form-control mr-sm-2" id="exampleFormControlSelect1">
      <option>Categoria</option>
    </select>

    <input name="buscarpor" id="uno" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  </nav>

<!---------------------------------------------->
<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de categorias</h3>
          </div>
          <div class="pull-right">
            <div style=" padding-right: 10px;"  class="btn-group"><br>
              <a href="{{ route('Categorias.create') }}" class="btn btn-info" style="border-radius:12px">Añadir categoria </a>
        </div><br><br>
          </div>
          <br><br><br><br>

<div id="no-more-tables">
   <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style= "text-align:center">ID</th>
             <th style= "text-align:center"> CATEGORIA</th>
             <th style="text-align: cente;background-color:#FFE0BA">EDITAR</th>
               <th style="text-align: cente;background-color:#FFE0BA">ELIMINAR</th>
             </thead>
             <tbody class="buscar">
              @if($Categor->count())  
              @foreach($Categor as $Categ)  
              <tr>
              <td style= "text-align:center" data-title="Id">{{$Categ->idCategorias}}</td>
              <td style= "text-align:center" data-title="Categoria">{{$Categ->Categoria}}</td>
         
                <td style= "text-align:center" data-title="Actualizar"><a class="btn btn-primary btn-xs" href="{{action('CategoriasController@edit', $Categ->idCategorias)}}" ><i class="fa fa-pencil" aria-hidden="true"></i></a></td>  
                <td style= "text-align:center" data-title="Eliminar">
                  <form method= "post" action = "{{url('/Categorias/'.$Categ->idCategorias)}}" >
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
      {{ $Categor->links() }}
    </div>
  </div>
</section>

@endsection
