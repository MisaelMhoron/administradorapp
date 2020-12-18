@extends('layouts.layout')

@section('content')

<div class="row">
	<section class="content">
<div  class="col-md-6 col-md-offset-3">
		
		
			<div class="panel panel-primary">
			<div class="panel-heading">
					<h3 class="panel-title">Nuevo Evento</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Eventos.store') }}"  role="form" enctype= "multipart/form-data">
							{{ csrf_field() }}
							

<!-------------------------------------------------------------->				 
@error('Nombre')
 <div class="alert alert-danger">
el nombre es requerido
</div>
@enderror	
	<h6>Los campos marcados con <span style="color:red; font-size: 15pt">*</span> son obligatorios</h6>	
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del evento</label> <span style="color:red; font-size: 15pt">*</span>   
	<textarea  name="Nombre"  style="font-family: Arial;text-align: justify; font-size: 11pt"  rows="2" cols="5" id="Nombre" required="required" class="form-control input-sm" placeholder="Nombre..." value="{{ old('Nombre') }}"></textarea>
	</div>
	</div>
	</div>
<!-------------------------------------------------------------->					
@error('imagen')
                            <div class="alert alert-danger">
                           la imagen es requerida
							</div>
							@enderror
@yield('scripts')
<script>
/****************para reset imagen********************* */
function Preview_Image_Before_Upload(fileinput_id, preview_id) {
  var oFReader = new FileReader();
  var fileArray = [];
  fileArray.push(document.getElementById(fileinput_id).files[0])
  fileArray.forEach(function(entry) {

    oFReader.readAsDataURL(fileArray[0]);

  });

  //console.log(fileArray)

  // oFReader.readAsDataURL(fileArray[0]);
  oFReader.onload = function(oFREvent) {
    if (window.FileReader && window.File && window.FileList && window.Blob) {

      var elem = document.getElementById("uploadPreview1");

      elem.src = oFREvent.target.result;

     // document.getElementById("placehere").appendChild(elem);
      document.getElementById("uploadPreview1").innerHTML=elem;

    }
  };
};

function removeFns(){
//document.getElementById("uploadPreview").innerHTML=null;
document.getElementById('uploadImage1').value = ""
document.getElementById('uploadPreview1').src = "#";

}	
</script>

	
<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="imagen">Imagen</label> <span style="color:red; font-size: 15pt">*</span>  
        <input name="imagen" type="file"  id="uploadImage1" required="required"  onchange="Preview_Image_Before_Upload('uploadImage1', 'uploadPreview1');" class="file_input" value="{{ old('imagen') }}">   

<img id="uploadPreview1" onclick="removeFns()" class="uploadPreview1" width="75%" height="75%"/>
<div id="placehere" class="uploadPreview1" width="75%" height="75%">

</div>
</div>
<!-------------------------------------------------------------->							
<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del Evento</label> <span style="color:red; font-size: 15pt">*</span>   
	<textarea name="Descripcion" style="font-family: Arial; text-align: justify; font-size: 11pt;text-align: justify" rows="5" cols="30" id="Descripcion" required="required" class="form-control input-sm" placeholder= "Descripción del evento........."></textarea>
	</div>
		</div>
	</div>				
<!-------------------------------------------------------------->
<div>
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Fecha del evento</label> <span style="color:red; font-size: 15pt">*</span> 
<input type="date" name="fecha" id="fecha" style="font-family: Arial; font-size: 11pt; height:34px" required="required" class="form-control" aria-describedby="basic-addon1" placeholder="Ejemplo 24/11/2020">
</div>
		</div>		
		</div>		

<!--	<div>
	<div class="col-xs-5 col-sm-15 col-md-15">						
<div class="form-group">
	<label for="fecha" class="negrita">Fecha del evento</label>   
	<input type="date" name="fecha" id="fecha"  required="required" class="form-control input-sm" class="form-control input-sm" placeholder="fecha de evento..">
	</div>
		</div>		
		</div>	<br><br>	<br><br>
		-->
<!-------------------------------------------------------------->
<div>
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Hora del evento</label> <span style="color:red; font-size: 15pt">*</span>  
<input type="time" name="hora" id="hora" style="font-family: Arial; font-size: 11pt;height:34px" required="required" class="form-control" aria-describedby="basic-addon1" placeholder="ejemplo 08:45 p.m.">
</div>
		</div>		
			
		
<!-------------------------------------------------------------->
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de evento publicado en Facebook</label>  
<input type="url" name="linkFacebook"  id="linkFacebook" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1" placeholder="link de evento ..." value="{{ old('linkFacebook') }}">
	</div>
	</div>

<!------------------------------------->

<!-------------------------------------------------------------->	
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="mapa_idMapa") {
        if(this.checked) $('#mapa_idMapa').val(this.value);
        else $('#mapa_idMapa').val("");
    }
});

</script>


		
<div>
<div>						
		<div class="form-group">
		<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Mapa</label>
	<input type="text" name="mapa_idMapa"  id="mapa_idMapa" readonly  style=" font-family: Arial; font-size: 11pt;height:34px" class="form-control"  aria-describedby="basic-addon1" placeholder="N° de mapa..." value="{{ old('mapa_idMapa') }}"></textarea>
	</div>
	</div>
	</div>
	
		
<!--------------------------boton para modal -------------------->	
<script>
function llamarVistaParcial() {
	//var laURLDeLaVista = 'https://192.168.43.22/sonsonateadmin/public/modal/';
	var laURLDeLaVista = 'https://www.turismoapps.com/modal?api_key=PZifmOFMzXz1xf7V01e94ypEMmLtPFpmmIJkTtyXCLc=';
    $.ajax({
        cache: false,
        async: true,
        type: "GET",
        url: laURLDeLaVista,
        data: {},
        success: function (response) {
            $('#resultado').html('');
            $('#resultado').html(response);
        }
    });
}
</script>
<button type="button" class="btn btn-info" onclick="llamarVistaParcial();" data-toggle="modal" data-target="#myModal" >
ver mapas
</button>

<!-- Modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style= "text-align:center;" class="modal-title">Mapas</h4>
        </div>
        <div class="modal-body">
            <div id="resultado"></div>
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
									<a href="{{ route('Eventos.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
