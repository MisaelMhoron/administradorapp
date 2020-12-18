<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
/*********para scroll boostrap */
.tableFixHead          { overflow-y: auto; height: 300px; }
.tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px;font-size: 10pt; text-align: center; }
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

<div class="tableFixHead">
       <table class="table table-striped table-bordered" style="width: 100%">
    
    <thead class="thead-dark">
    <tr>
               <th>SELECCIONAR</th>
                <th>ID</th>
               <th>CATEGORIA</th>

    </tr>
  </thead>
  <tbody>
  @if($Categor->count())  
@foreach($Categor as $Categ)   
  <tr>
  <td ><label><input type="checkbox" name="idCategorias" id="idCategorias" value= "{{$Categ->idCategorias}}"></label> </td>
              <td>{{$Categ->idCategorias}}</td>
              <td>{{$Categ->Categoria}}</td>
    </tr>
    @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
</table>    
    </div>
  </div>
</div>
