<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>



body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: white;
  border-radius:25px;
  margin: 2px;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  
}
/***al pasar mouse */
.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #0688C9;
  color: white;
  border-radius:20px;
}

.dropdown-content a:hover {
  background-color: black;
  color: white;
  
}

.dropdown:hover .dropdown-content {
  display: block;
  border-radius:20px;
    z-index: 20;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

/***********yo */
html, body{
   height:100%;
}
.contenido{
   min-height:100%;
   margin:0 auto -142px;
}
.espacio_vacio{
   height:90px;
}

* {
  margin: 0;
}

.wrapper {
  min-height: calc(100% - 4rem);
}
.footer {
  height: 4rem;
  
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
}

</style>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div class="topnav" id="myTopnav">

  <a href="https://www.turismoapps.com/" class="active"><img src="{!! asset('images/iconosonso.png') !!} "  width="110" height="35"></a>
 
  <a href="https://www.turismoapps.com/sitioturistico"><i class=" fa fa-map-marker"></i> Sitios turísticos</a> 
    <a href="https://www.turismoapps.com/Menu"><i class="fa fa-mobile" aria-hidden="true"></i> Menú principal</a> 
    
    
 
  
    <!--  --------menu eventos------------------- -->
  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-calendar"></i> Eventos <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
 <a href="https://www.turismoapps.com/Eventos"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Eventos turísticos</a> 

    </div>
  </div> 
 <!--  --------------------------- -->

    <!--  --------------------------- -->
  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-map-o" aria-hidden="true"></i> Mapas 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
  
    <a href="https://www.turismoapps.com/mapas"><i class="fa fa-map"></i> Mapa</a>
     <a href="https://www.turismoapps.com/mapascategory"><i class="fa fa-map"> </i> Categoria de mapa</a>
   
    </div>
  </div> 
  <!--  --------------------------- -->
  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-handshake-o" aria-hidden="true"></i> Servicios 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="https://www.turismoapps.com/alojamiento"><i class="fa fa-bed" aria-hidden="true"></i> Alojamiento</a> 
    <a href="https://www.turismoapps.com/restaurantes"><i class="fa fa-cutlery"></i> Restaurantes</a>
    </div>
  </div> 
  <!--  --------------------------- --> 

  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-pie-chart" aria-hidden="true"></i> Estadisticas  
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="https://www.turismoapps.com/graficas"><i class="fa fa-bar-chart" aria-hidden="true"></i> Graficas</a> 
    <a href="https://www.turismoapps.com/usuarios"><i class="fa fa-address-book-o" aria-hidden="true"></i> Registros</a>
    </div>
  </div>
  <!--  --------------------------- -->

  <div style="float: right;"  class="dropdown">
    <button  class="dropbtn"><i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }} 
      <i class="fa fa-caret-down"></i>
    </button>
 
    <div class="dropdown-content">

    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    Cerrar sesión
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    </div>
  </div> 
 <!--  --------------------------- -->

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
