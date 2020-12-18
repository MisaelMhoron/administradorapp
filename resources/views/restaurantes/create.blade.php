@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-6 col-md-offset-3">
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo restaurante</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('restaurantes.store') }}"  role="form" enctype= "multipart/form-data">
							{{ csrf_field() }}
						
							@error('nombre')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror
	<h6>Los campos marcados con <span style="color:red; font-size: 15pt">*</span> son obligatorios</h6>	
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del restaurante</label>  <span style="color:red; font-size: 15pt">*</span>  
<input type="text" name="nombreRest" required="required" id="nombreRest" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"  placeholder="nombre..." value="{{ old('nombreRest') }}" >
	</div>
	</div>
	</div>
<!-------------------------------------------------------------------->
	
<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Dirección del restaurante</label><span style="color:red; font-size: 15pt">*</span>   
	<textarea name="direccion" style="font-family: Arial; font-size: 11pt;text-align: justify"  rows="5" cols="30" id="direccion" required="required" class="form-control input-sm" placeholder="Direccion del alojamiento......" value="{{ old('direccion') }}"></textarea>
	</div>
	</div>
	</div>
<!------------------------------------------------------------------------------>	
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
<img id="uploadPreview1" onclick="removeFns()" class="uploadPreview1" alt ="" width= "75%"/>
<div id="placehere" class="uploadPreview1" alt ="" width= "75%">

</div>
</div>

<!-------------------------------------------------------------------->	   
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
font-size: 11pt" for="imagen">Imagen 2</label>  
		<input name="imagen2" type="file" id="uploadImage2" onchange="resetimg2('uploadImage2', 'uploadPreview2');" class="file_input" value="{{ old('imagen2') }}">               
	<img id="uploadPreview2" onclick="removeimg2()" class="uploadPreview2" alt ="" width= "75%"/>
	<div id="placehere" class="uploadPreview2" alt ="" width= "75%">

	</div>
	</div>

<!-------------------------------------------------------------------->
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
		<input name="imagen3" type="file" id="uploadImage3" onchange="resetimg3('uploadImage3', 'uploadPreview3');" class="file_input" value="{{ old('imagen3') }}">               
		
		<img id="uploadPreview3" onclick="removeimg3()" class="uploadPreview3" alt ="" width= "75%"/>
		<div id="placehere" class="uploadPreview3" alt ="" width= "75%">

		</div>
		</div>
	
<!-------------------------------------------------------------------->      

<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del resturante</label><span style="color:red; font-size: 15pt">*</span>   
	<textarea name="descripcion" style="font-family: Arial; font-size: 11pt;text-align: justify" rows="5" cols="30" id="descripcion" required="required" class="form-control input-sm" placeholder="descripcion del alojamiento......" value="{{ old('descripcion') }}"></textarea>
	</div>
	</div>
	</div>
<!------------------------------------------------------------------------------>
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de Facebook</label>  
<input type="url" name="facebookLink"  id="facebookLink" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1" placeholder="link de fanpage facebook..." value="{{ old('facebookLink') }}">
	</div>
	</div>

<!------------------------------------->
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de Instagram</label>    
<input type="url" name="instagramLink" rows="2" cols="5" id="instagramLink"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" placeholder="link de instagram..." value="{{ old('instagramLink') }}">
	</div>
	</div>

<!---------------------------------------->
<script>        
              function phoneno(){          
               $('#phone').keypress(function(e) {
                   var a = [];
                   var k = e.which;

                   for (i = 48; i < 58; i++)
                       a.push(i);

                   if (!(a.indexOf(k)>=0))
                       e.preventDefault();
               });
           }
          </script>
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Numero de WhatsApp</label>

<input type="text" name="whatsappNum" value="+503" pattern="^\+[0-9]{11}$" maxlength="12" id="telf"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" placeholder="ejemplo: +50370205060" value="{{ old('whatsappNum') }}">
	</div>
	</div>


<!--
  <label for="phone">Enter a phone number:</label><br><br>
  <input type="tel" id="numWhatsapp" name="numWhatsapp" placeholder="503########" pattern="[0-9]{3}[0-9]{8}" required><br><br>
</form>  -->
<!---------------------------------------->
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de página web</label> 
<input type="url" name="pageWebLink"  id="pageWebLink"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" placeholder="link de pagina web..." value="{{ old('pageWebLink') }}">
	</div>
	</div>

		
	<!---------------------------------------------------------------------->
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Número telefónico</label>  
<input type="text"  name="telefono" pattern="[0-9]{8}"  maxlength="8" placeholder="ejemplo: 24587896" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"  value="{{ old('telefono') }}">	
	</div>
	</div>

<!--
  <label for="phone">Enter a phone number:</label><br><br>
  <input type="tel" id="numWhatsapp" name="numWhatsapp" placeholder="503########" pattern="[0-9]{3}[0-9]{8}" required><br><br>
</form>  -->
<!---------------------------------------->
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
<span class="input-group-addon" style=" color: black;font-family: Arial; font-weight: bold; font-size: 11pt; background-color: white" id="basic-addon1">Mapa</span>       
		<input type="text" name="mapa_idMapa" id="mapa_idMapa" readonly style=" font-family: Arial; font-size: 11pt;height:34px" class="form-control"  aria-describedby="basic-addon1"  placeholder="N°"  value="{{ old('mapa_idMapa') }}">
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
            $('#resultadomapa').html('');
            $('#resultadomapa').html(response);
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
            <h4 style="text-align:center;" class="modal-title"> MAPAS</h4>
        </div>
        <div class="modal-body">
            <div id="resultadomapa"></div>
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
		<a href="{{ route('restaurantes.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>


	</section>
	@endsection
