<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/** boton */

/******* */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #b3b3b3;
}

li {
  float: left;
}

li a, .dropbtn {
  display: block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
/**color al pasar el puntero encima */
li a:hover:not(.active) {
  background-color: #0389B8;
}
/********************************* */
li a.active {
  color: white;
  background-color: blue;
}
/*******yo************ */

.dropdown-content {
  display: none;
  position: relative;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: black;}

.dropdown:hover .dropdown-content {
  display: block;
}
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
  background-color: #b3b3b3;
  color: white;
}

</style>

<ul>
  <li> <a class="active" href="https://sonsoapp.000webhostapp.com/"><i class="fa fa-home"></i> Home</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/sitioturistico"><i class=" fa fa-map-marker"></i> Sitios turísticos</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/Eventos"><i class="fa fa-calendar"></i> Eventos</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/alojamiento"><i class="fa fa-h-square"></i> Alojamiento</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/usuarios"><i class="fa fa-pie-chart"></i> Estadisticas</a> </li>

  <li class="dropdown">
    <a href="https://sonsoapp.000webhostapp.com/mapas" class="dropbtn"><i class="fa fa-map"></i> Mapas</a>
    <div class="dropdown-content">
      <a href="https://sonsoapp.000webhostapp.com/mapascategory"><i class="fa fa-map"></i>  Categorias de mapas</a> 
      <a href="https://sonsoapp.000webhostapp.com/asignacategory"><i class="fa fa-map"></i>  asignacion de categoria</a> 
    </div>
  </li>

  <li> <a href="https://sonsoapp.000webhostapp.com/Menu"><i class="fa fa-bars"></i> Menu</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/restaurantes"><i class="fa fa-cutlery"></i> Restaurantes</a> </li>
  <li> <a href="https://sonsoapp.000webhostapp.com/Categorias"><i class="fa fa-cog"></i> Categorias</a> </li>
  
  <li style="float:right"><a href="#about">About</a></li>

</ul>


<!-- ----------------------------------- -->
@guest
                      <!--       <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                         <!--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

<!--
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #b3b3b3;
}

li {
  float: left;
}

li a, .dropbtn {
 display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/**color al pasar el puntero encima */
li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;

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
  background-color: #b3b3b3;
  color: white;
}



}

</style>
</head>
<body>
<div class="wrapper">

<ul>
  <li><a class="active" href="https://fontawesome.com/v4.7.0/icon/cutlery">Home</a></li>
  <li> <a href="https://fontawesome.com/v4.7.0/icon/cutlery"><i class=" fa fa-map-marker"></i> Sitios turísticos</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/Eventos"><i class="fa fa-calendar"></i> Eventos</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/alojamiento"><i class="fa fa-h-square"></i> Alojamiento</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/usuarios"><i class="fa fa-pie-chart"></i> Estadisticas</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/mapas"><i class="fa fa-map"></i> Mapas</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/Menu"><i class="fa fa-bars"></i> Menu</a> </li>
  <li> <a href="https://192.168.43.22/sonsonateadmin/public/restaurantes"><i class="fa fa-cutlery"></i> Restaurantes</a> </li>
   <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </li>
  <li style="float:right"><a href="#about">About</a></li>

</ul>
<footer class="footer">
  <p>Contenido del pié de la página.</p>
</footer>
</body>
</html>

  -->