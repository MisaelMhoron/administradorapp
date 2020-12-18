@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
	<div  class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
			<div class="panel-heading">
					<h3 class="panel-title">Editar evento</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('Eventos.update',$Event->idEventos) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">

<!--------------------------------------------------->	
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del evento</label>  
	<textarea  name="Nombre"  style="font-family: Arial;text-align: justify; font-size: 11pt" rows="2" cols="5"  required="required" class="form-control input-sm" >{{$Event->Nombre}}</textarea>
	</div>
	</div>
	</div>					
<!------------------------------------------------------------>	

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
font-size: 11pt" for="imagen">Imagen</label>  
		<input type="file" name="imagen"  id="uploadImage1" onchange="Preview_Image_Before_Upload('uploadImage1', 'uploadPreview1');" class="file_input"/>

			<img src= "{{$Event->imagen}}"  class="img-thumbnail" id="uploadPreview1"  onclick="removeFns()" class="uploadPreview1" width="75%" height="75%" src=""/>
			<input type="hidden" name="hidden_image" value="{{ $Event->imagen }}" />
		
		</div>
		</div>

<!--------------------------------------------------->	

<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del Evento</label>   
	<textarea name="Descripcion" rows="10" style="font-family: Arial; text-align: justify; font-size: 11pt;text-align: justify" cols="30" id="Descripcion" required="required" class="form-control input-sm" >{!! $Event->Descripcion!!}</textarea>
	</div>
		</div>
	</div>														
<!------------------------------------------------------------>		
<div>
<div class="form-group">
<div class="col-xs-12 col-md-3 input-group input-group-sm">
<span class="input-group-addon" style="color: black;font-family: Arial;font-weight: bold; font-size: 11pt; background-color: white" id="basic-addon1">Fecha del evento</span>
	<input type="date" name="fecha" id="fecha" style="font-family: Arial; font-size: 11pt;height:34px" required="required" class="form-control" aria-describedby="basic-addon1" value="{{$Event->fecha}}">
	</div>
		</div>		
		</div>										
<!----------------------------------------------------------->									
<div>
<div class="form-group">
<div class="col-xs-12 col-md-3 input-group input-group-sm">
<span class="input-group-addon" style="color: black;font-family: Arial;font-weight: bold; font-size: 11pt; background-color: white" id="basic-addon1">Hora del evento</span>
	<input type="time" name="hora" id="hora" style="font-family: Arial; font-size: 11pt;height:34px" required="required" class="form-control" aria-describedby="basic-addon1" value="{{$Event->hora}}">
	</div>
	</div>
	</div>								
<!----------------------------------------------------------->		

<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de evento publicado en Facebook</label> 
<input type="url" name="linkFacebook" rows="2" cols="5" id="linkFacebook"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value="{{$Event->linkFacebook}}">
	</div>
	</div>
	
<!--------------------------------------------------->
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="mapa_idMapa") {
        if(this.checked) $('#mapa_idMapa').val(this.value);
        else $('#mapa_idMapa').val("");
    }
});

</script>

<div>
<div class="form-group">
<div class="col-xs-12 col-md-3 input-group input-group-sm">
<span class="input-group-addon" style="color: black;font-family: Arial;font-weight: bold; font-size: 11pt; background-color:white" id="basic-addon1">Id del mapa</span>
<input type="text" name="mapa_idMapa" id="mapa_idMapa"class="form-control" readonly aria-describedby="basic-addon1" style="font-family: Arial; font-size: 11pt;height:34px" value="{{$Event->mapa_idMapa}}">
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
            <h4 class="modal-title">Mapas</h4>
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
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
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
