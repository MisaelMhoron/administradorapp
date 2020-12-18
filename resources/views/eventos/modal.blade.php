<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
/*********para scroll boostrap */
.tableFixHead          { overflow-y: auto; height: 500px; }
.tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px;font-size: 10pt;  }
th     {  background-color: #DEEFEF;
  text-align: center;}


/********************************** */

    </style>
    
    <script>
        
        $('table').on('scroll', function () {
    $("table > *").width($("table").width() + $("table").scrollLeft());
});
    </script>
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
 <table class="table table-responsive table-bordered">
  <thead>
    <th>seleccionar</th>
    <th>ID MAPA</th>
    <th>TITULO</th>
    </tr>
  </thead>
 <tbody class="buscar">
  @foreach($Maps as $MapaRe) 
    <tr>
    <td ><label><input type="checkbox" name="mapa_idMapa" id="mapa_idMapa" value="{{$MapaRe->idMapa}}"></label> </td>
    <td >{{$MapaRe->idMapa}}</td>
    <td>{{$MapaRe->titulo}}</td>
            
    </tr>
  
    @endforeach 
  </tbody>
</table>


      
    </div>
  </div>
</div>
