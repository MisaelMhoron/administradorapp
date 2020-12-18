<!DOCTYPE html>
<html>
<head>
<style>
table {  color: #333; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse: collapse;}

td, th { border: 1px solid transparent; height: 30px; }

th { background: #D3D3D3; font-weight: bold; }

td { background: #FAFAFA; text-align: center; }

tr:nth-child(even) td { background: #F1F1F1; }  

tr:nth-child(odd) td { background: #FEFEFE; } 

tr td:hover { background: #666; color: #FFF; }

</style>
</head>
<body>
<h4 style="text-align:center;">INFORME DE ASISTENCIA DE EVENTOS</h4>
<table class="table table-bordered">
<tr>
<th>Nombre del evento</h2>
<th>cantidad de asistentes </h2>
<th> fecha de realización </h2>
</tr>
@foreach($favoritos  as $asis)
<tr>
<td>{{$asis->Nombre}}</td>
<td>{{$asis->number}}</td>
<td>{{$asis->fecha}}</td>
</tr>
@endforeach
</table>
</body>
</html>
