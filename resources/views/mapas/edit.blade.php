@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
	<div class="col-md-6 col-md-offset-3">
	<!--		@if (count($errors) > 0)
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
	
<!------------------------------------------------------------------------------>
<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"> Editar Registro de Mapas</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('mapas.update',$Maps->idMapa) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
<!------------------------------------------------------------------------->	
@error('titulo')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror

							
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Título</label>  
<input type="text" name="titulo" id="titulo" required="required" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1" value="{{$Maps->titulo}}">
</div>
</div>
</div>
							
<!--------------------------------------------------------------------------->								
	
<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del mapa</label>   
	<textarea name="descripcion" rows="3" cols="10" id="descripcion" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control input-sm" >{!! $Maps->descripcion!!}</textarea>
	</div>
	</div>
	</div>
<!------------------------------------------------------------------------------>							
							
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Latitude del lugar</label>
 <input type="number" min="0" step="any" name="latitude" id="latitude" required="required" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control" aria-describedby="basic-addon1" value="{{$Maps->latitude}}">
						 </div>
					   </div>
				
<!------------------------------------------------------------------------------>																	
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Longitude del lugar</label> 
<input type="number" step="any" name="longitude" id="longitude" required="required" style="font-family: Arial; font-size: 11pt;text-align: justify"  class="form-control" aria-describedby="basic-addon1" value="{{$Maps->longitude}}">
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
</div>
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="map_idMapCategoty">Categoria del mapa</label>  

<input type="text" name="map_idMapCategoty" id="map_idMapCategoty" required="required" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1" value="{{$Maps->map_idMapCategoty}}">
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
Ver categoria de mapas
</button>

<!-- Modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Mapas</h4>
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
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
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
