@extends('layouts.layout')
@section('content')

<style>
html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}
footer {
 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: white;
}
</style>

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
		
<!------------------------------------------------------------------------------>
<div class="panel panel-primary">
			<div class="panel-heading">
					<h3 class="panel-title"> Editar categoria de mapa</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
					<form method="POST" action="{{ route('mapascategory.update',$MapCate->idMapCategoty) }}"  role="form" enctype= "multipart/form-data" >
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
font-size: 11pt" for="nombre">Categoria</label>    
			<input type="text" name="Categoria" id="Categoria" required="required" style="font-family: Arial;text-align: justify; font-size: 11pt" class="form-control"  aria-describedby="basic-addon1"  value="{{$MapCate->Categoria}}">
			</div>
	</div>
	</div>
			
<!---------------------------------------------------------------------->	
<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('mapascategory.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
