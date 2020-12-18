@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-6 col-md-offset-3">
		
<!------------------------------------------------------------------------------>
<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"> Editar sección</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('Menu.update',$Menus->idMenu) }}"  role="form" enctype= "multipart/form-data" >
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
<!------------------------------------------------------------------------->	


<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre del menú</label>  
			<input type="text" name="nombre" id="nombre" required="required" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1"  value="{{$Menus->nombre}}">
			</div>
			</div>
			</div>				
<!--------------------------------------------------------------------------->								
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
 
		<img src= "{{$Menus->imagen}}" class="img-thumbnail" id="uploadPreview1"  onclick="removeFns()" class="uploadPreview1" width="75%" height="75%" src=""/>
		<input type="hidden" name="hidden_image" value="{{ $Menus->imagen }}" />
		</div>
		</div>

	<!-- ----------------------------------------- -->
		<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre"> Nombre de la etiqueta</label>  <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>      
	<input type="text" name="Etiqueta" id="Etiqueta" required="required" style="font-family: Arial; font-size: 11pt;width:250px;height:34px" class="form-control"  aria-describedby="basic-addon1" value="{{$Menus->Etiqueta}}">
						 </div>
					   </div>
					   
							
<!------------------------------------------------------------------------------>
	
	<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Nombre de la subetiqueta</label>  <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>      
	<input type="text" name="SubEtiqueta" id="SubEtiqueta"  style="font-family: Arial; font-size: 11pt;width:250px;height:34px" class="form-control"  aria-describedby="basic-addon1" value="{{$Menus->SubEtiqueta}}">
						 </div>
					   </div>
					   
							
<!------------------------------------------------------------------------------>
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Dependencia</label>  <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>  
<input type="number" min="1" max="3"  step="1" name="IDDependencia" id="IDDependencia" required="required" style="font-family: Arial; font-size: 11pt;height:34px" class="form-control"  aria-describedby="basic-addon1" value="{{$Menus->IDDependencia}}">
						 </div>
					   </div>
				
<!------------------------------------------------------------------------------>																	
<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Orden</label>  <i  onclick="alert('¡Hola, soy un mensaje de alerta!')" style="color:orange"  class="fa fa-info-circle fa-lg" aria-hidden="true"></i>   
<input type="number" min="1" step="1" name="Orden" id="Orden" required="required" style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control"  aria-describedby="basic-addon1" value="{{$Menus->Orden}}">
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

					   <div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Sitio turístico</label>    
<input type="text" name="sitio_idSitio" id="sitio_idSitio"  style="font-family: Arial; font-size: 11pt;text-align: justify" class="form-control" placeholder="N°" readonly aria-describedby="basic-addon1" value="{{$Menus->sitio_idSitio}}">
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
            <h4 style="text-align:center;" class="modal-title">SITIOS TURÍSTICOS</h4>

        </div>
        <div class="modal-body">
            <div id="resultadositio"></div>
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
