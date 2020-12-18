@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

<style>
   
    #Contenedor{
	width: 370px;
	margin: 50px auto;
	background-color: rgba(29, 29, 29 ,0.3);
     border: 1px solid #ECE8E8;
	height: 450px;

	padding: 0px 9px 0px 9px;
	
	border-radius:30px;
	
}

@media only screen and (max-width: 990px) {

  #Contenedor{
	width: 350px;
	margin: 20px auto;
	background-color: rgba(192,192,192,0.3);
     border: 1px solid #ECE8E8;
	height: 500px;

	padding: 0px 10px 0px 40px;
	
	border-radius:30px;
	
}
.stiloinput{
    width:215px;
    height:30px;
}

.img{
   align:center;
   	height: 100px; 
   	 width: 100px; 
}

.boton_personalizado{
   text-decoration: none;
    padding: 5px;
  font-weight: bold;
    font: 150% sans-serif;
    color: white;
 background-color:rgb(79, 141, 200 );opacity:0.6;
    border-radius: 20px;
    border: 4px solid #032B81;
  font-size:12pt;
  width:50px;
        height:60px;
          outline: none;
         
  }
   .boton_personalizado:hover{
    font: 150% sans-serif;
    color: white;
   background-color:rgb(2, 63, 152 );opacity:0.8;
     border-radius: 20px;
    border: 4px solid #040162;
     cursor: pointer;
  }
  	button.centrado {
  width: 20px; /* Para que no se rompa en dos líneas, y lo translade tal cual. */
  margin-left: 50%;
  transform: translateX(-50%);
}
.btnabc{
    padding-left:30px;
   }

}
@media only screen and (max-width: 800px) {
    
.btnabc{
    padding-left:0px;
   }

	#Contenedor{
		width: 250px;
		margin: 50px auto;
		background-color: #EDF6F7;
		 border: 1px solid #ECE8E8;
		height: 500px;
		background-color: rgba(192,192,192,0.3);
		padding: 15px 20px 0px 12px;
		
		border-radius:30px;
		
	}
		.boton_personalizado{
   text-decoration: none;
    padding: 10px;
  font-weight: bold;
    font: 150% sans-serif;
    color: white;
 background-color:rgb(79, 141, 200 );opacity:0.6;
    border-radius: 20px;
    border: 4px solid #032B81;
  font-size:12pt;
  width:50px;
        height:60px;
          outline: none;
         
  }
   .boton_personalizado:hover{
    font: 150% sans-serif;
    color: white;
   background-color:rgb(2, 63, 152 );opacity:0.8;
     border-radius: 20px;
    border: 4px solid #040162;
     cursor: pointer;
  }
  	button.centrado {
  width: 20px; /* Para que no se rompa en dos líneas, y lo translade tal cual. */
  margin-left: 50%;
  transform: translateX(-50%);
}


   
	}
	button.centrado {
  width: 110px; /* Para que no se rompa en dos líneas, y lo translade tal cual. */
  margin-left: 50%;
  transform: translateX(-50%);
}

.img{
   	height: 100px; 
   	 width: 100px; 
}
.imgeye{
    top:0;
   	height: 50px; 
   	 width: 50px; 
}

</style>

<script>
 function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
</script>

<!-- ------------------------------- -->
<div  id="Contenedor">
		 <div class="Icon">
                    <!--Icono de usuario-->
    <div align="center"><img class="img"  src="images/avatar.png"></div>
        </div>
<div class="ContentForm">

<style>
body {
  background-image: url('images/fondohome.webp');

 
}


.boton_personalizado{
   text-decoration: none;
    padding: 5px;
    
  font-weight: bold;
    font: 150% sans-serif;
    color: white;
 background-color:rgb(79, 141, 200 );opacity:0.6;
    border-radius: 40px;
    border: 4px solid #032B81;
  font-size:14pt;
  width:200px;
        height:60px;
          outline: none;
          
  
  }
  .boton_personalizado:hover{
    font: 150% sans-serif;
    color: white;
   background-color:rgb(2, 63, 152 );opacity:0.8;
     border-radius: 40px;
    border: 4px solid #040162;
     cursor: pointer;
  }
   
   .btnabc{
    padding-right:70px;
   }
  
</style>
<!-- ---------------------------------- -->

    
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
<br>
                     
<div class="form-group">
    <label style="color:white; font-size: 12pt;" for="usuario">Correo electrónico</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
<!-- ----------------------------------------------- -->
<label style="color:white; font-size: 12pt;" >Contraseña</label>

<div class="input-group">
  <input ID="txtPassword" type="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  <span class="input-group-btn">
    <button id="show_password"  class="btn btn-primary"  type="button" onclick="mostrarPassword()"><span class="fa fa-eye-slash icon"></span> </button>
    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div><br>
<!-- ------------------------------------------------------- -->
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="color:white; font-size: 12pt;"  class="form-check-label" for="remember">
                                       Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div  class="btnabc">
                          <div class="col-md-offset-3 col-md-8 col-md-offset-3">
                                <button type="submit" class="boton_personalizado">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a style="color:white; font-size:12pt;"  class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste la contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
