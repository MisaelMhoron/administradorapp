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
					<h3 class="panel-title"> Editar restaurante</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('restaurantes.update',$Restau->idRest) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del restaurante</label>  
<input type="text" name="nombreRest" id="nombreRest" required="required" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"  value="{{$Restau->nombreRest}}">
									</div>
								</div>
							
<!--------------------------------------------------->	
	
	
<div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Dirección del restaurante</label>    
	<textarea name="direccion" style="font-family: Arial; font-size: 11pt;text-align: justify"   rows="5" cols="30" id="direccion" required="required" class="form-control input-sm" >{!! $Restau->direccion!!}</textarea>
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
font-size: 11pt" for="imagen">Imagen</label>  
		<input type="file" name="imagen"  id="uploadImage1" onchange="Preview_Image_Before_Upload('uploadImage1', 'uploadPreview1');" class="file_input"/>

			<img src= "{{$Restau->imagen}}" id="uploadPreview1"  onclick="removeFns()" class="uploadPreview1" alt ="" width= "75%" src=""/>
			<input type="hidden" name="hidden_image" value="{{ $Restau->imagen }}" />

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
			<img src= "{{$Restau->imagen2}}" id="uploadPreview2"  onclick="removeimg2()" class="uploadPreview2" alt ="" width= "75%" src="" />
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
			<img src= "{{$Restau->imagen3}}"   id="uploadPreview3"  onclick="removeimg3()" class="uploadPreview3" alt ="" width= "75%"src=""  />

			<input type="hidden" name="hidden_image" value="{{ $Restau->imagen3 }}" />
	   </div>
	   </div>
 <!--------------------------------------------------->
 <div>	
		<div class="col-xs-15 col-sm-15 col-md-15">					
		<div class="form-group">
    <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Descripción del resturante</label>      
	<textarea name="descripcion" style="font-family: Arial; font-size: 11pt;text-align: justify"  rows="5" cols="30" id="texto" required="required" class="form-control input-sm" >{!! $Restau->descripcion!!}</textarea>
	</div>
		</div>
	</div>

<!--------------------------------------------------->						
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de Facebook</label> 
<input type="url" name="facebookLink" rows="2" cols="5" id="facebookLink"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value="{{$Restau->facebookLink}}">
	</div>
	</div>
	
<!--------------------------------------------------->
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de Instagram</label>     
<input type="url" name="instagramLink" rows="2" cols="5" id="instagramLink" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value="{!! $Restau->instagramLink!!}">
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
<input type="tel" id="whatsappNum"  name="whatsappNum" pattern="^\+[0-9]{11}$" maxlength="12"  style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"   placeholder="ejemplo: +50370205060"  value= "{!! $Restau->whatsappNum!!}">
	</div>
	</div>
	
	  <!--------------------------------------------------->	
	  <div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Link de página web</label>    
	<input type="url" name="pageWebLink"  id="pageWebLink" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1" value="{!! $Restau->pageWebLink!!}">
	</div>
		</div>
							
	<!---------------------------------------------------------------------->	
	
	<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Número telefónico</label>   
	<input type="tel"  pattern="[0-9]{8}"  name="telefono"  placeholder="ejemplo: 24587896"  placeholder="ejemplo: 24538459"  maxlength="8" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"  value= "{!! $Restau->telefono!!}" >
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
<span class="input-group-addon" style="color: black;font-family: Arial; font-size: 11pt;font-weight: bold;  background-color: white" id="basic-addon1">Id de mapa</span>   
		<input type="text"  name="mapa_idMapa" id="mapa_idMapa" readonly style=" font-family: Arial; font-size: 11pt;height:34px" class="form-control"  aria-describedby="basic-addon1" input-sm" value="{{$Restau->mapa_idMapa}}">
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
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('restaurantes.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
