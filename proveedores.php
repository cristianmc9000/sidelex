
<?php
require('recursos/conexion.php');

$Sql = "SELECT a.Ci, b.Nombre as Nome, a.Nombre, a.Apellidos, a.Telefono FROM proveedor a, empresa b where a.Code = b.Code and a.Estado = 1;"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('ci'=>$arr['Ci'], 'nombre'=>$arr['Nombre'], 'ap'=>$arr['Apellidos'], 'nome'=>$arr['Nome'], 'telf'=>$arr['Telefono']); 
    } 

$Sql2 = "SELECT * FROM empresa WHERE Estado = 1;"; 
$Busq2 = $conexion->query($Sql2); 
while($arr2 = $Busq2->fetch_array()) 
    { 
        $fila2[] = array('code'=>$arr2['Code'], 'nombre'=>$arr2['Nombre']); 
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
  #modal1{
    width: 40%;
  }
  
</style>

<span class="fuente"><h3>Proveedores
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>

<div class="row">
  <div class="col s12 m12">
     <table id="tabla1" class="highlight">
        <thead>
           <tr>
           	<th class="center">Ci</th>
              <th class="center">Nombre</th>
              <th class="center">Teléfono</th>
              <th class="center">Empresa</th>
              <th class="center">Acciones</th>
           </tr>          
        </thead>
        <tbody>
        	 <?php foreach($fila as $a  => $valor){ ?>
           <tr>
              
              <td class="center"><?php echo $valor["ci"]?></td>
              <td class="center"><?php echo $valor["nombre"]?> <?php echo $valor["ap"] ?></td>
              <td class="center"><?php echo $valor["telf"] ?></td>
              <td class="center"><?php echo $valor["nome"] ?></td>
              <td class="center"><a href="#" class="btn-floating"><i class="material-icons">build</i></a>
              <a href="#" class="btn-floating"><i class="material-icons">delete</i></a>
  	          <a href="#" class="btn-floating"><i class="material-icons">search</i></a></td>
           </tr>
           <?php } ?>	
        </tbody>
     </table> 
   </div>
</div>


<!-- Modal Agregar Proveedor -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h5 class="fuente">Nuevo Proveedor</h5>
    <div class="row">
      <form action="#" id="nuevo_prov" method="POST">

        <div class="input-field col s12">
          <input id="__ci" name="__ci" type="text" onKeyPress="return checkIt(event)" required>
          <label for="__ci">Cédula</label>
        </div>

        <div class="input-field col s6">
          <input id="__nombre" name="__nombre" type="text" class="validate" required>
          <label for="__nombre">Nombres</label>
        </div>

        <div class="input-field col s6">
          <input id="__ap" name="__ap" type="text" class="validate" required>
          <label for="__ap">Apellidos</label>
        </div>
        <div class="input-field col s6">
          <input id="__telf" name="__telf" type="text" onKeyPress="return checkIt(event)" class="validate" required>
          <label for="__telf">Teléfono</label>
        </div>
        <div class="input-field col s6">
          <select name="__emp">
            <?php foreach($fila2 as $a  => $valor){ ?>
            <option value="<?php echo $valor['code'] ?>"><?php echo $valor['nombre'] ?></option>
            <?php } ?>
          </select>
          <label>Empresa</label>
        </div>

      </form>
    </div>
  </div>
  <div class="modal-footer">
          <button class="btn waves-effect waves-light right" type="submit" form="nuevo_prov" name="acceso">Agregar</button>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red left">Cancelar</a>
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
    $('select').material_select();
    $('#modal').leanModal();
});

var mensaje = $("#mensaje");
mensaje.hide();

$("#nuevo_prov").on("submit", function(e){
  e.preventDefault();

  var formData = new FormData(document.getElementById("nuevo_prov"));
  $.ajax({
    url: "recursos/nuevo_proveedor.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    mensaje.html(echo);
    $("#cuerpo").load("proveedores.php");
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