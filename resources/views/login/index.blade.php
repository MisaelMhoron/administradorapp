@extends('layouts.layout')
@section('content')

 
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
<!-------------- PARA FILTRAR BUSQUEDAS -------------------------------->
<nav class="navbar navbar-light float-right">
  <form style=" padding-left: 10px;" class="form-inline">

  <select name="tipo" class="form-control mr-sm-2" id="exampleFormControlSelect1">

      <option>nacionalidad</option>
        <option>genero</option>
      <option>fechaNac</option>
    </select>
 <input name="buscarpor" id="uno" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
    <input type="date" class="form-control mr-sm-2" style="width:70px;height:34px" class="form-control" id="trord" onblur="document.getElementById('uno').value=this.value"/>
     
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  </nav>
<!---------------------------------------------->

<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Listado de usuarios registrados</h3>
          </div>
          <div class="pull-right">
            
          </div>
          

          <div id="no-more-tables">
       <div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
             <th style="text-align: center">ID</th>
               <th style="text-align: center">NOMBRE DE USUARIO</th>
               <th style="text-align: center">NACIONALIDAD</th>
               <th style="text-align: center">GÉNERO</th>
               <th style="text-align: center">EDAD</th>
             </thead>
             <tbody class="buscar">
              @if($Inicios->count())  
              @foreach($Inicios as $login)  
              <tr>
              <div class="more">
              <td style="text-align: center" data-title="ID">{{$login->idLogin}}</td>
                <td style="text-align: center" data-title="Nombre de usuario">{{$login->nombreUsuario}}</td>
                <td style="text-align: center" data-title="Nacionalidad">{{$login->nacionalidad}}</td>
                <td style="text-align: center" data-title="Genero">{{$login->genero}}</td>
                <td style="text-align: center" data-title="Edad">{{\Carbon\Carbon::parse($login->fechaNac)->age}}</td>
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
      {{ $Inicios->links() }}
    </div>
  </div>
</section>

@endsection

