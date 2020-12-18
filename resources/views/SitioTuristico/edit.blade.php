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

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Editar sitio turístico</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('sitioturistico.update',$Sitio->idsitioturistico) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							@include('errores.error')
							<input name="_method" type="hidden" value="PATCH">
							
							<div>						
							<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del sitio turístico</label>     
	<input type="text" name="nombre" id="nombre" required="required" style="font-family: Arial; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value="{{$Sitio->nombre}}">
	</div>
	</div>
	</div>				
<!--------------------------------------------------->	
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
font-size: 11pt" for="imagen">Imagen 1</label>
			<input type="file" name="imagen"  id="uploadImage1" onchange="Preview_Image_Before_Upload('uploadImage1', 'uploadPreview1');" class="file_input"/>

			<img src= "{{$Sitio->imagen}}" class="img-thumbnail" id="uploadPreview1"  onclick="removeFns()" class="uploadPreview1" width="75%" height="75%" src=""/>
		
		</div>
		</div>
	
<!--------------------------------------------------->
<script>
/****************para reset imagen********************* */
function resetimg2(fileinput_id, preview_id) {
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

      var elem = document.getElementById("uploadPreview2");

      elem.src = oFREvent.target.result;

     // document.getElementById("placehere").appendChild(elem);
      document.getElementById("uploadPreview2").innerHTML=elem;

    }
  };
};

function removeimg2(){
//document.getElementById("uploadPreview").innerHTML=null;
document.getElementById('uploadImage2').value = ""
document.getElementById('uploadPreview2').src = "#";

}		
</script>

<div class="col-xs-15 col-sm-15 col-md-15">					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="imagen">Imagen 3</label>  
<input type="file" name="imagen2" id="uploadImage2" onchange="resetimg2('uploadImage2', 'uploadPreview2');" class="file_input" />
<img src= "{{$Sitio->imagen2}}" class="img-thumbnail" id="uploadPreview2"  onclick="removeimg2()" class="uploadPreview2" width="75%" height="75%" src="" />
</div>
</div>
		
<!--------------------------------------------------->
<script>
/****************para reset imagen********************* */
function resetimg3(fileinput_id, preview_id) {
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

      var elem = document.getElementById("uploadPreview3");

      elem.src = oFREvent.target.result;

     // document.getElementById("placehere").appendChild(elem);
      document.getElementById("uploadPreview3").innerHTML=elem;

    }
  };
};
function removeimg3(){
//document.getElementById("uploadPreview").innerHTML=null;
document.getElementById('uploadImage3').value = ""
document.getElementById('uploadPreview3').src = "#";
}	
</script>


<div class="col-xs-15 col-sm-15 col-md-15">					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="imagen">Imagen 3</label>  
<input type="file" name="imagen3" id="uploadImage3" onchange="resetimg3('uploadImage3', 'uploadPreview3');" class="file_input" />
<img src= "{{$Sitio->imagen3}}" class="img-thumbnail" id="uploadPreview3"  onclick="removeimg3()" class="uploadPreview3" width="75%" height="75%" src=""  />
</div>
</div>

 <!--------------------------------------------------->
 
	
 <div>	
<div class="col-xs-15 col-sm-15 col-md-15">					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del sitio turístico</label> 
<textarea name="texto" rows="8" cols="30" id="texto" style="font-family: Arial;text-align: justify; font-size: 11pt"  required="required" class="form-control input-sm" >{!! $Sitio->texto!!}</textarea>
</div>
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
<div>					
<div class="form-group">
<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Mapa</label> 
<input type="text" name="mapa_idMapa" rows="3" cols="5" id="mapa_idMapa" placeholder="N° de mapa" readonly style="font-family: Arial; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value= "{!! $Sitio->mapa_idMapa!!}">
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
            <h4 style="text-align:center;" class="modal-title">Mapas</h4>
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
<div>
	<div class="col-xs-15 col-sm-15 col-md-15">
	<div class="form-group">
	<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del sitio turístico para QR</label> 
	<textarea name="textoQR" rows="8" cols="30" id="texto" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control input-sm" >{!! $Sitio->textoQR!!}</textarea>
	</div>
	</div>
	</div>
<!--------------------------------------------------->
<script>
/****************para reset imagen********************* */
function resetimg4(fileinput_id, preview_id) {
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

      var elem = document.getElementById("uploadPreview4");

      elem.src = oFREvent.target.result;

     // document.getElementById("placehere").appendChild(elem);
      document.getElementById("uploadPreview4").innerHTML=elem;

    }
  };
};
function removeimg4(){
//document.getElementById("uploadPreview").innerHTML=null;
document.getElementById('uploadImage4').value = ""
document.getElementById('uploadPreview4').src = "#";
}	
</script>

<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="imagen">Imagen QR</label>  
			<input type="file" name="imgQR" id="uploadImage4" onchange="resetimg4('uploadImage4', 'uploadPreview4');" class="file_input"  />
		
			<input type="text" name="imgQR" value="{{$Sitio->imgQR}}" hidden= "true" > 
			
			<img src= "{{$Sitio->imgQR}}" class="img-thumbnail"  id="uploadPreview4" onclick="removeimg4()" class="uploadPreview4" width="75%" height="75%" src=""  />

	   </div>
	   </div>
	   
 <!--------------------------------------------------->
<div>
<div>					
		<div class="form-group">
		<label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Code QR</label> 
<input type="text" name="codeQR" rows="3" cols="5" id="codeQR"  style="font-family: Arial; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value= "{!! $Sitio->codeQR!!}">
	</div>
		</div>
	</div>
	
<!-------------------------------------------------------------->	
					
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('sitioturistico.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
