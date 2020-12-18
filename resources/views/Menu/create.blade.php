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
					<h3 class="panel-title">Nueva sección</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Menu.store') }}"  role="form" enctype= "multipart/form-data">
							{{ csrf_field() }}
<!------------------------------------------------------------->							
							@error('nombre')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror
	<h6>Los campos marcados con <span style="color:red; font-size: 15pt">*</span> son obligatorios</h6>	
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del menú</label><span style="color:red; font-size: 15pt">*</span>        
<input type="text" name="nombre" required="required" id="nombre"  style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1"  placeholder="nombre..." value="{{ old('nombre') }}" >
	</div>
	</div>
	</div>
<!--------------------------------------------------------------->
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
font-size: 11pt" for="imagen">Imagen</label><span style="color:red; font-size: 15pt">*</span>  
		<input name="imagen" type="file"  id="uploadImage1" required="required"  onchange="Preview_Image_Before_Upload('uploadImage1', 'uploadPreview1');" class="file_input" value="{{ old('imagen') }}">   
<img id="uploadPreview1" onclick="removeFns()" class="uploadPreview1" width="75%" height="75%"/>
<div id="placehere" class="uploadPreview1" width="75%" height="75%">

</div>
</div>

	
<!---------------------------------------------------------------------->
                           @error('Etiqueta')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror

							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre"> Nombre de la etiqueta</label><span style="color:red; font-size: 15pt">*</span> <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange" class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
<input type="text" name="Etiqueta" required="required" id="Etiqueta" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1"  placeholder="Etiqueta..." value="{{ old('Etiqueta') }}" >
</div>
</div>
<!---------------------------------------------------------------------->

							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="SubEtiqueta"> Nombre de la subetiqueta</label>
<input type="text" name="SubEtiqueta"  id="SubEtiqueta" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1"  placeholder="SubEtiqueta..." value="{{ old('SubEtiqueta') }}" >
</div>
</div>

<!---------------------------------------------------------------------->


                            @error('IDDependencia')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Dependencia</label><span style="color:red; font-size: 15pt">*</span> <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
<input type="number" min="1" step="1" max="3" name="IDDependencia" required="required"  id="IDDependencia" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1" placeholder="IDDependencia..." value="{{ old('IDDependencia') }}" >
									</div>
									</div>
								
							
<!---------------------------------------------------------------------->								
        @error('Orden')
                            <div class="alert alert-danger">
                            El orden es requerido
							</div>
							@enderror
							<div>	                  					
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Orden</label><span style="color:red; font-size: 15pt">*</span>  <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
<input type="number" min="1" step="1" name="Orden" required="required"  id="Orden" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1" placeholder="Orden..." value="{{ old('Orden') }}" >
</div>
</div>

<!---------------------------------------------------------------------->									
<script>
$(document).on('change','input[type="checkbox"]' ,function(e) {
    if(this.id=="sitio_idSitio") {
        if(this.checked) $('#sitio_idSitio').val(this.value);
        else $('#sitio_idSitio').val("");
    }
});

</script>                         
	
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Sitio turístico</label>   
<input type="number" name="sitio_idSitio" readonly id="sitio_idSitio" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1" placeholder="N°..." value="{{ old('sitio_idSitio') }}" >
</div>
		</div>								

							
<!--------------------------boton para modal -------------------->	
<script>
function llamarVistaParcial() {
	//var laURLDeLaVista = 'https://192.168.43.22/sonsonateadmin/public/modal/';
	var laURLDeLaVista = 'https://www.turismoapps.com/modalsitio?api_key=PZifmOFMzXz1xf7V01e94ypEMmLtPFpmmIJkTtyXCLc=';
    $.ajax({
        cache: false,
        async: true,
        type: "GET",
        url: laURLDeLaVista,
        data: {},
        success: function (response) {
            $('#resultadositio').html('');
            $('#resultadositio').html(response);
        }
    });
}
</script>



<button type="button" class="btn btn-info" onclick="llamarVistaParcial();" data-toggle="modal" data-target="#myModal" >
ver sitios turísticos
</button>

<!-- Modal -->
<div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" data-backdrop="static" data-keyboard="false"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 style="text-align:center;">SITIOS TURÍSTICOS</h4>

        </div>
        <div    class="modal-body">
            <div  id="resultadositio"></div>
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
									<a href="{{ route('Menu.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
