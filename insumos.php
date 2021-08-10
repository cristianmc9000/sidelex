 <?php
require('recursos/conexion.php');

$_SESSION['filas'] = array(); 
$Sql = "SELECT * FROM insumo WHERE Estado = 1"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('codi'=>$arr['Codi'], 'nombre'=>$arr['Nombre'], 'costo'=>$arr['Costo'], 'cant'=>$arr['Cantidad'], 'fechacom'=>$arr['Fecha_compra'], 'descripcion'=>$arr['Descripcion']); 
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

<span class="fuente"><h3>Insumos
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>
<div class="row">
  <div class="col s12 m12">
    <table id="tabla1" class="highlight">
      <thead>
         <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Costo</th>
            <th>Cantidad</th>
            <th>Fecha de compra</th>
            <th>Descripción</th>
            <th>Acciones</th>
         </tr>          
      </thead>
      <tbody>
      	 <?php foreach($fila as $a  => $valor){ ?>
         <tr>
            <td><?php echo $valor["codi"] ?></td>
            <td><?php echo $valor["nombre"] ?></td>
            <td align="center"><?php echo $valor["costo"] ?></td>
            <td align="center"><?php echo $valor["cant"] ?></td>
            <td align="center"><?php echo $valor["fechacom"] ?></td>
            <td align="center"><?php echo $valor["descripcion"] ?></td>
            <td align="center"><a href="#!" class="btn btn-floating" onclick="modal_borrar_insumo('<?php echo $valor['codi'] ?>');"><i class="material-icons">delete</i></a></td>
         </tr>
         <?php } ?>	
      </tbody>
    </table> 
  </div>
</div>


<!-- Modal Agregar Insumo ESTO AGREGUE.... COPIAR -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h5>Agregar insumo</h5>
    <div class="row">
      <form action="#" id="nuevoinsumo" method="POST">
        <div class="input-field col s12">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre</label>
        </div>

        <div class="input-field col s6">
          <input id="costo" name="costo" type="text" class="validate" required>
          <label for="costo">Costo en Bs.</label>
        </div>

        <div class="input-field col s6">
          <input id="cant" name="cant" onKeyPress="return checkIt(event)" type="number" class="validate" required>
          <label for="cant">Cantidad</label>
        </div>

        <div class="input-field col s12">
          <input type="date" id="fecha_com" name="fecha_com">
          <label for="fecha_com" class="active">Fecha de compra</label>
        </div>

        <div class="input-field col s12">
          <input id="descrip" name="descrip" type="text" class="validate" required>
          <label for="descrip">Descripción</label>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
          <button class="btn waves-effect waves-light right" type="submit" form="nuevoinsumo" name="acceso">Agregar</button>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red left">Cancelar</a>
  </div>
</div>
<!-- HASTA AQUI... -->



<div class="row">
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Se eliminará el insumo seleccionado.</h4>
      <input type="text" id="codinsumo" hidden>
    </div>

    <div class="modal-footer row">
      <a href="#!" class=" modal-action modal-close waves-effect waves-light btn-large red left">Cancelar</a>
      <a href="#!" onclick="borrar_insumo();" class="waves-effect waves-light btn-large green right">Aceptar</a>
    </div>
  </div>
</div>

<div id="mensaje"></div>

<script>
$(document).ready(function() {
    $('#tabla1').dataTable();
    $('#modal').leanModal();

    //DATE PICKER EN ESPAÑOL
    // $('.datepicker').pickadate({
    //   monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    //   monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    //   weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    //   weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
    //     selectMonths: true,
    //     selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
    //     today: 'Hoy',
    //     clear: 'Limpiar',
    //     close: 'Ok',
    //     labelMonthNext: 'Siguiente mes',
    //   labelMonthPrev: 'Mes anterior',
    //   labelMonthSelect: 'Selecciona un mes',
    //   labelYearSelect: 'Selecciona un año',
    //   });
});

var mensaje = $("#mensaje");
mensaje.hide();

$("#nuevoinsumo").on("submit", function(e){
  e.preventDefault();

  var formData = new FormData(document.getElementById("nuevoinsumo"));
  $.ajax({
    url: "recursos/nuevo_insumo.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    // console.log(echo);
    mensaje.html(echo);
    $("#cuerpo").load("insumos.php");
  });
});

function modal_borrar_insumo(cod) {
  $("#codinsumo").val(cod);
  $("#modal2").openModal();
}


function borrar_insumo() {
  var data = {codin: $("#codinsumo").val()}
  $.ajax({
  url: "recursos/borrar_insumo.php",
  data: data,
  method: "post",
  success: function(response){
    mensaje.html(response)
    $("#cuerpo").load("insumos.php")
  },
  error: function(error, data, response){
    console.log(error)
  }
  });
}
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