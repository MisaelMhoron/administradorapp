@extends('layouts.layout')
@section('content')

<div class="row">
	<section class="content">
		<div class="col-md-6 col-md-offset-3">
		<!--	@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif -->
		
			<div class="panel panel-primary">
			<div class="panel-heading">
					<h3 class="panel-title">Nuevo Mapa</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('mapas.store') }}"  role="form" enctype= "multipart/form-data">
							{{ csrf_field() }}
<!------------------------------------------------------------->							
							@error('titulo')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror
	<h6>Los campos marcados con <span style="color:red; font-size: 15pt">*</span> son obligatorios</h6>								
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Título</label> <span style="color:red; font-size: 15pt">*</span>   
<input type="text" name="titulo" required="required" id="titulo" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1"  placeholder="titulo del lugar..." value="{{ old('titulo') }}" >
</div>
</div>
</div>
<!--------------------------------------------------------------->
	
<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del mapa</label><span style="color:red; font-size: 15pt">*</span>   
	<textarea name="descripcion" rows="3" cols="10" style="font-family: Arial; font-size: 11pt;text-align: justify" id="descripcion" required="required" class="form-control input-sm" placeholder="Descripción del sitio..." value="{{ old('descripcion') }}"></textarea>
	</div>
	</div>
	</div>
<!------------------------------------------------------------------------------>	
                           @error('latitude')
                            <div class="alert alert-danger">
                          La latitud es requerida
							</div>
							@enderror
							
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Latitude del lugar</label><span style="color:red; font-size: 15pt">*</span>
<input type="number" min="0" step="any" name="latitude" required="required" id="latitude" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control" aria-describedby="basic-addon1" placeholder="Ejmpl: 13.7204742" value="{{ old('latitude') }}" >
</div>
</div>

<!---------------------------------------------------------------------->


                            @error('longitude')
                            <div class="alert alert-danger">
                           La langitud es requerida
							</div>
							@enderror
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Longitude del lugar</label><span style="color:red; font-size: 15pt">*</span>
<input type="number" step="any" name="longitude" required="required" id="longitude"  style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control" aria-describedby="basic-addon1" placeholder="Ejmpl: -89.7212532" value="{{ old('longitude') }}" >
									</div>
								
							
<!---------------------------------------------------------------------->								
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="map_idMapCategoty") {
        if(this.checked) $('#map_idMapCategoty').val(this.value);
        else $('#map_idMapCategoty').val("");
    }
});

</script>

<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Categoria del mapa</label> <span style="color:red; font-size: 15pt">*</span>  
<input type="text" name="map_idMapCategoty" required="required" readonly id="map_idMapCategoty" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1"  placeholder="N° de categoria..." value="{{ old('map_idMapCategoty') }}" >
</div>
</div>
</div>

<!--------------------------boton para modal -------------------->	
<script>
function llamarVistaParcial() {
	//var laURLDeLaVista = 'https://192.168.43.22/sonsonateadmin/public/modal/';
	var laURLDeLaVista = 'https://www.turismoapps.com/modalcategoriamapa';
    $.ajax({
        cache: false,
        async: true,
        type: "GET",
        url: laURLDeLaVista,
        data: {},
        success: function (response) {
            $('#resultadocat').html('');
            $('#resultadocat').html(response);
        }
    });
}
</script>
<button type="button" class="btn btn-info" onclick="llamarVistaParcial();" data-toggle="modal" data-target="#myModal" >
Ver Categoria de mapas
</button>

<!-- Modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="text-align:center;" class="modal-title">Ver categoria de mapas</h4>
        </div>
        <div class="modal-body">
            <div id="resultadocat"></div>
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
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('mapas.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
