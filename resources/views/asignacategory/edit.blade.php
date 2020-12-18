@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
	<div class="col-md-6 col-md-offset-3">
			<br><br>
<!------------------------------------------------------------------------------>
<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Editar asignacion categoria de mapa</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('asignacategory.update',$AsiCategory->idAsignacionesCat) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
<!-------------------------------------------------------------->	
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="idCategorias") {
        if(this.checked) $('#idCategorias').val(this.value);
        else $('#idCategorias').val("");
    }
});

</script>


<div>
<div>					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Categoria</label> 
<input type="text" name="idCategorias" rows="3" cols="5" id="idCategorias" placeholder="N° de categoria" readonly style="font-family: Arial; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value= "{!! $AsiCategory->idCategorias!!}">
</div>
</div>
</div>	


<!--------------------------boton para modal -------------------->	
<script>
function llamarcategoria() {
	//var laURLDeLaVista = 'https://192.168.43.22/sonsonateadmin/public/modal/';
	var urlcategoria = 'https://sonsoapp.000webhostapp.com/modalcategoria';
    $.ajax({
        cache: false,
        async: true,
        type: "GET",
        url: urlcategoria,
        data: {},
        success: function (response) {
            $('#resultadocategoria').html('');
            $('#resultadocategoria').html(response);
        }
    });
}
</script>

<button type="button" class="btn btn-info" onclick="llamarcategoria();" data-toggle="modal" data-target="#myModal1" >
ver categorias
</button>

<!-- Modal -->
<div id="myModal1" class="modal fade bd-example-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="text-align:center;"class="modal-title">CATEGORIAS</h4>
        </div>
        <div class="modal-body">
            <div id="resultadocategoria"></div>
        </div>
		
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
    </div>
</div>
</div>
<br>
<br>
<!-------------------------------------------------------------->	
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="idEventos") {
        if(this.checked) $('#idEventos').val(this.value);
        else $('#idEventos').val("");
    }
});

</script>


<div>
<div>					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Evento</label> 
<input type="text" name="idEventos" rows="3" cols="5" id="idEventos" placeholder="N° de evento" readonly style="font-family: Arial; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value= "{!! $AsiCategory->idEventos!!}">
</div>
</div>
</div>	
<!--------------------------boton para modal -------------------->	
<script>
function llamarVistaParcial() {
	//var laURLDeLaVista = 'https://192.168.43.22/sonsonateadmin/public/modal/';
	var laURLDeLaVista = 'https://www.turismoapps.com/modalevento';
    $.ajax({
        cache: false,
        async: true,
        type: "GET",
        url: laURLDeLaVista,
        data: {},
        success: function (response) {
            $('#resultadoevento').html('');
            $('#resultadoevento').html(response);
        }
    });
}
</script>

<button type="button" class="btn btn-info" onclick="llamarVistaParcial();" data-toggle="modal" data-target="#myModal" >
ver Eventos
</button>

<!-- Modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EVENTOS</h4>
        </div>
        <div class="modal-body">
            <div id="resultadoevento"></div>
        </div>
		
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
        </div>
    </div>
</div>
</div>
<br>
<br>
<!-------------------------------------------------------------->	
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('asignacategory.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
