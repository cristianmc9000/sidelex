
<?php
require('recursos/conexion.php');

$Sql = "SELECT Ci, Nombre, Apellidos, Telefono FROM `cliente` where Estado = 1;"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('ci'=>$arr['Ci'], 'nombre'=>$arr['Nombre'], 'apellidos'=>$arr['Apellidos'], 'telefono'=>$arr['Telefono']); 
    } 
?>

<style>
  .fuente{
  	font-family: 'Segoe UI light';
  	color: red;
  }


  table.highlight > tbody > tr:hover {
    background-color: #a0aaf0 !important;
  }
</style>

<span class="fuente"><h3>Clientes
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal_nuevo_cliente" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>

<div class="row">
  <div class="col s12 m12 l12">
   <table id="tabla1" class="highlight">
      <thead>
         <tr>
         	<th class="center">Ci</th>
            <th class="center">Nombre</th>
            <th class="center">Teléfono</th>
            <th class="center">Acciones</th>
         </tr>          
      </thead>
      <tbody>
      	 <?php foreach($fila as $a  => $valor){ ?>
         <tr>
            <td class="center"><?php echo $valor["ci"] ?></td>
            <td class="center"><?php echo $valor["nombre"]." ".$valor["apellidos"] ?></td>
            <td class="center"><?php echo $valor["telefono"] ?></td>

            <td class="center"><a href="#" class="btn btn-small"><i class="material-icons">build</i></a>
	          <a href="#" class="btn btn-small" ><i class="material-icons">delete</i></a>
	          <a href="#" class="btn btn-small"><i class="material-icons">search</i></a></td>
         </tr>
         <?php } ?>	
      </tbody>
   </table> 
 </div></div>



<!-- Modal formulario agregar cliente -->
<div class="row">
  <div id="modal1" class="modal col s8 offset-s2 m4 offset-m4">
 
      <h5>Nuevo Cliente</h5>
      <form id="form_nuevo_cliente" action="" method="POST" accept-charset="utf-8">
        <div class="input-field col s12 m12">
          <input id="ci" name="ci" type="number" onKeyPress="return checkIt(event)" class="validate" required>
          <label for="ci"># Cédula</label>
        </div>
        <div class="input-field col s12 m12">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre</label>
        </div>
        <div class="input-field col s12 m12">
          <input id="apellidos" name="apellidos" type="text" class="validate" required>
          <label for="apellidos">Apellidos</label>
        </div>

        <div class="input-field col s12 m12">
          <input id="telefono" onKeyPress="return checkIt(event)" name="telefono" type="number" class="validate">
          <label for="telefono">Teléfono</label>
        </div>    
        <div class="modal-footer col s12 m12">
          <button class="btn waves-effect waves-light right" type="submit" name="acceso">Agregar</button>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red left">Cancelar</a>
        </div>
      </form>
  </div>
</div>


<!--MODAL PARA RECIBIR MENSAJES DESDE PHP-->  
<div class="row">
  <div id="modal2" class="modal col s4 offset-s4">
    <div id="mensaje" class="modal-content">
      
    </div>
    <div class="modal-footer row">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#tabla1').dataTable();
    $('#modal_nuevo_cliente').leanModal();
});


var mensaje = $("#mensaje");
mensaje.hide();

$("#form_nuevo_cliente").on("submit", function(e){
  e.preventDefault();

  var formData = new FormData(document.getElementById("form_nuevo_cliente"));
  $.ajax({
    url: "recursos/nuevo_cliente.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    mensaje.html(echo);
    $("#cuerpo").load("clientes.php");
  });
});

function checkIt(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
  status = "Este campo acepta números solamente.";
  return false;
  }
  status = "";
  return true;
}
</script>