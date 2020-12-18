<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

<style>
/*********para scroll boostrap */
.tableFixHead          { overflow-y: auto; height: 300px; }
.tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px;font-size: 10pt;  }
th     {  background-color: #DEEFEF;
  text-align: center;}


/********************************** */
</style>

<!-- ------------------------------------------ -->
<script>
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>
<!-- ------------------------------------------ -->
 <!-------------- PARA FILTRAR BUSQUEDAS -------------------------------->
<script>
$(document).ready(function () {
 
 (function ($) {

     $('#filtrar').keyup(function () {

          var rex = new RegExp($(this).val(), 'i');

          $('.buscar tr').hide();

          $('.buscar tr').filter(function () {
            return rex.test($(this).text());
          }).show();

     })

 }(jQuery));

});
</script>

<div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
 <br>
<!---------------------------------------------->
<div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <th>seleccionar</th>
    <th style="text-align: center">ID</th>
   <th style="text-align: center">TITULO</th>
    </tr>
  </thead>
 <tbody class="buscar">
  @foreach($MapCate as $MapaCa)  
    <tr>
    <td ><label><input type="checkbox" name="map_idMapCategoty" id="map_idMapCategoty" value="{{$MapaCa->idMapCategoty}}"></label> </td>
    <td style="text-align: center" >{{$MapaCa->idMapCategoty}}</td>
    <td style="text-align: center">{{$MapaCa->Categoria}}</td>

    </tr>
    
    @endforeach 

  </tbody>
</table>    
    </div>
  </div>
</div>
