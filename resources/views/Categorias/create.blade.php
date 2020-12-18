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
					<h3 class="panel-title">Nueva categoria</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('Categorias.store') }}"  role="form" enctype= "multipart/form-data">
							{{ csrf_field() }}
<!------------------------------------------------------------->							
							@error('titulo')
                            <div class="alert alert-danger">
                            El nombre es requerido
							</div>
							@enderror

	
							<div>						
<div class="form-group">
 <label style="color: black;padding: 8px;font-family: Arial;
font-size: 11pt" for="nombre">Categoria</label>      
<input type="text" name="Categoria" required="required" id="Categoria" style="font-family: Arial;text-align: justify; font-size: 11pt"  class="form-control"  aria-describedby="basic-addon1"  placeholder="Categoria..." value="{{ old('Categoria') }}" >
							</div>
	</div>
	</div>						
<!---------------------------------------------------------------------->	
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('Categorias.index') }}" class="btn btn-warning btn-block" >Cancelar</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
