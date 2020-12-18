<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sonsonate</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans|Oswald:300,400,700');

html {
  font-size:100%; // normally 16px
}

body {
  font-family: 'Open Sans', sans-serif;
  color: #fff;
  line-height: 1.6;
}

.img-responsive {
  max-width: 100%;
  height: auto;
  display: block;
}

h1 {
  text-align: center;
  font-family: "Oswald", sans;
  font-size: 4rem;
  font-weight: normal;
  line-height: 3.5rem;
}

h3 {
  font-size: 1.35rem;
  line-height: 2rem;
  text-transform: uppercase;
  letter-spacing: 1px; // Smaller headers look better with spacing
}

.container {
  margin: 0 auto;
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: url('images/fondohome.webp');
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}

.item {
  /* Padding is used for smaller screens */
  padding: 0 30px 0 30px;
  text-align: center;
}


.btn {
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-top: 1rem;  
  display: inline-block;
  line-height: 1.25rem;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: .75rem 1.25rem;
  font-size: 1rem;
  border-radius: .25rem;
  transition: all .2s ease-in-out;
  
  &.btn-primary {
    color: #fff;
    background-color: #000;
    border-color: #666;

    &:hover {
      color: #fff;
      background-color: #333;
      border-color: #666;
    }  
  }  
}



// .btn-primary:hover {
//   color: #fff;
//   background-color: #333;
//   border-color: #666;
// }


// Extra small devices (portrait phones, less than 576px)
// No media query since this is the default

// Small devices (landscape phones, 576px and up)
// @media (min-width: 576px) {
 
// }

// Medium devices (tablets, 768px and up)
// @media (min-width: 768px) {
  
// }

// Large devices (desktops, 992px and up)
@media (min-width: 992px) {
  .item {
    width:80%;
  } 
}

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) {
  .item {
    width:60%;
  }
}
/**para texto 3d */
.textoddd {
  font: bold 80px/1 arial;
  text-transform: uppercase;
  color: white;
  text-shadow: 0  2px 0 #8b6e15,
               0  4px 0 #7c6213,
               0  6px 0 #6e5611, 
               0  8px 0 #5f4b0e, 
               0 10px 0 #503f0c,
               0 12px 0 #41330a;
}

@media only screen and (max-width: 800px) {

.textoddd {
  font: bold 40px/1 arial;
  text-transform: uppercase;
  color: white;
  text-shadow: 0  2px 0 #8b6e15,
               0  4px 0 #7c6213,
               0  6px 0 #6e5611, 
               0  8px 0 #5f4b0e, 
               0 10px 0 #503f0c,
               0 12px 0 #41330a;
}
}

/**** */
.boton_personalizado{
   text-decoration: none;
    padding: 10px;
  font-weight: bold;
    font: 150% sans-serif;
    color: #ffffff;
    background-color: #036527;
    border-radius: 40px;
    border: 4px solid #3CF96D;
     width:300px;
        height:60px;
          outline: none;
          
  
  }
  .boton_personalizado:hover{
    color: black;
    background-color: #03771A;
     border-radius: 40px;
    border: 4px solid #61FB45;
     cursor: pointer;
  }


        </style>
        
    </head>
    <body>

<div class="container">
  <div class="item">
    
    <h3 class="textoddd">BIENVENIDOS</h3>
    <hr class="w3-border-grey" style="margin:auto;width:60%">
    <h4></h4>
    @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <button class="boton_personalizado"> <a style="text-decoration:none" href="{{ url('/graficas') }}">INICIO</a></button>

                    @else
                    <button class="boton_personalizado"> <a style="text-decoration:none" href="{{ route('login') }}">INICIAR SESIÓN </a></button>
                    
                   @endauth
                </div>
            @endif   

  </div>
</div>
    </body>
</html>
