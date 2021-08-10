 <?php
require('recursos/conexion.php');

$_SESSION['filas'] = array(); 
$Sql = "SELECT * FROM plato"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('nombre'=>$arr['Nombre'], 'precio'=>$arr['Precio'], 'descripcion'=>$arr['Descripcion'], 'foto'=>$arr['Foto']); 
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

  h5 {
    font-family: 'Segoe UI light';
  }
  #modal1{
    width: 40%;

  }

</style>

<span class="fuente"><h3>Platos
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal_agregar_plato" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>
<!-- Modal estructure -->
<div class="row">
  <div id="modal1" class="modal">
 
      <h5>Agregar nuevo plato</h5>
      <form id="form_nuevo_plato" action="" method="POST" accept-charset="utf-8">

        <div class="input-field col s7">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre del plato</label>
        </div>
        <div class="input-field col s3 offset-s1">
          <input id="precio" name="precio" type="text" class="validate" required>
          <label for="precio">Precio</label>
        </div>
        <div class="input-field col s11">
          <input id="descripcion" name="descripcion" type="text" class="validate" required>
          <label for="descripcion">Descripción</label>
        </div>

        <div class="file-field input-field col s11">
          <div class="btn">
            <span>Foto</span>
            <input type="file" name="imagen" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>


        <div class="modal-footer row">
          <button class="btn waves-effect waves-light right" type="submit" name="acceso">Agregar</button>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red left">Cancelar</a>
        </div>
      </form>
  

  </div>
</div>

<div class="row">
  <div class="col s12 m12">
    <table id="tabla1" class="highlight">
      <thead>
         <tr>
            <th class="center">Foto</th>
            <th class="center">Nombre</th>
            <th class="center">Precio</th>
            <th class="center">Descripción</th>
            <th class="center">Acciones</th>
         </tr>          
      </thead>
      <tbody>
      	 <?php foreach($fila as $a  => $valor){ ?>
         <tr>
            <td class="center"><img src="<?php echo $valor['foto'] ?>" width="50px"></td>
            <td class="center"><?php echo $valor["nombre"] ?></td>
            <td class="center"><?php echo $valor["precio"] ?></td>
            <td class="center"><?php echo $valor["descripcion"] ?></td>
            <td class="center"><a href="#!" class="btn btn-floating" onclick="mod_plato();"><i class="material-icons">build</i></a>
            <a href="#!" class="btn btn-floating" onclick="borrar_plato();"><i class="material-icons">delete</i></a></td>

         </tr>
         <?php } ?>	
      </tbody>
    </table> 
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
var mensaje = $("#mensaje");
mensaje.hide();

$(document).ready(function() {
    $('#tabla1').dataTable();
    $('#modal_agregar_plato').leanModal();
});


$("#form_nuevo_plato").on("submit", function(e){
  e.preventDefault();
  var formData = new FormData(document.getElementById("form_nuevo_plato"));
  $.ajax({
    url: "recursos/nuevo_plato.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    mensaje.html(echo);
    $("#cuerpo").load("platos.php");
  });
});

function mod_plato (){
  alert("modificando plato");
}

function borrar_plato (){
  alert("borrando plato");
}
</script>