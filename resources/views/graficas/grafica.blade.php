@extends('layouts.layout')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!---------------------------------------------->

  <!-- Latest compiled and minified CSS --> 
    <style>
.graficastyle {
  width:500px; 
  height: 420px;

 
  
}
table {
  border: 0px dashed; 
  border-collapse: collapse;
}

td {
       border: none;
}
@media only screen and (max-width: 700px) {

.graficastyle {
width:300px; 
height: 300px;


}
}
@media only screen and (max-width: 400px) {

.graficastyle {
width:330px; 
height: 300px;


}
}



</style>
<!-- ----------------------------------------------------------------- -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
       var analytics = <?php echo $gender; ?>

       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
          title: 'Registro de usuarios según género',
          pieHole: 0.3,
           colors: ['#038A8A', '#01625A'] 
        };
        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);   
      }
    </script>
<!-- ---------------------GRÁFICA PARA GRUPO ETARIO-------------------------------------------- -->
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
       
        ['rango de edad', 'cantidad',{ role: "style" } ],
            @foreach ($pastel as $pastels)
              ["{{$pastels->grupos}}", {{ $pastels->number}}, "#3C928C"],
      
            @endforeach
        ]);

     /*   
        ['genero', "Density", { role: "style" } ],
        ["Copper", 8.94, "hola mundo"],
        ["Silver", 10.49, "red"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);*/

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Registro de usuarios según grupo etario",
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>

<!-- ---------------------GRÁFICA PARA asistencias-------------------------------------------- -->
<script type="text/javascript">

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
       
        ['Nombre de evento', 'Cantidad de asistentes',{ role: "style" } ],
            @foreach ($datasis as $datasistencia)
              ["{{$datasistencia->Nombre}}", {{ $datasistencia->number}}, "#008795"],
             // ["{{$datasistencia->Nombre}}", {{ $datasistencia->number}}, "#56D313"],
            @endforeach
        ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Registro de usuarios que asistirián a los eventos",

        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuesistencia"));
      chart.draw(view, options);
  }
  </script>
<!-- -----------------------------------------------------------style="  overflow: scroll;"------ -->

<div class="container-fluid" >
  <div class="row">
    <div class="col-md-6" ><a href= "https://www.turismoapps.com/reporte"><i class="fa fa-download" aria-hidden="true"></i> Descargar reporte de eventos</a>
    
    <div id="barchart_valuesistencia" class="graficastyle">
        
    </div></div>
    <div class="col-md-6"><div id="barchart_values" class="graficastyle"></div></div>
    <div class="col-md-12" ><div id="donut_single" class="graficastyle"></div> </div>
  </div>
</div>


@endsection

