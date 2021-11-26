<?php
require('../../recursos/conexion.php');

// $_SESSION['filas'] = array(); 
//CONSULTA OBTENER DATOS DE USUARIOS
$Sql = "SELECT a.Ci, a.Nombre, a.Apellidos, a.Direccion, a.Telefono, a.Email, a.Foto, a.Fecha_nac, b.Nombre as NRol FROM `usuario` a, `rol` b Where a.Codrol = b.Codrol;"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('ci'=>$arr['Ci'], 'nombre'=>$arr['Nombre'], 'apellidos'=>$arr['Apellidos'], 'telefono'=>$arr['Telefono'], 'direccion'=>$arr['Direccion'], 'email'=>$arr['Email'], 'foto'=>$arr['Foto'], 'fnac'=>$arr['Fecha_nac'], 'rol'=>$arr['NRol']); 
    } 

//CONSULTA OBTENER ROLES
$Sql2 = "SELECT Codrol, Nombre FROM rol Where Estado = 1;"; 
$Busq2 = $conexion->query($Sql2); 
while($arr2 = $Busq2->fetch_array()) 
    { 
        $fila2[] = array('codrol'=>$arr2['Codrol'], 'nombre'=>$arr2['Nombre']); 
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
  .centra_mod{
    width: 40%;
    overflow-x: hidden;
  }
  .width_modal{
    width: 30%
  }
  #modal3{
    max-height: 90% !important;
    margin-top: -3%;
  }
  #perf_f{
    height: 20em;
  }
</style>

<span class="fuente"><h3>Usuarios	
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red modal-trigger" id="modal_nuevo_usuario" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>
<div class="row">
  <div class="col s12 m12 l12">
   <table id="tabla1" class="content-table">
      <thead>
         <tr>
            <th>Foto</th>
            <th>Ci</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Rol</th>
            <th class="center" width="15%">Acciones</th>

         </tr>          
      </thead>
      <tbody>
      	 <?php foreach($fila as $a  => $valor){ ?>
         <tr>
            <td><img src="<?php echo $valor['foto'] ?>" alt="" width="40px" height="40px"></td>
            <td><?php echo $valor["ci"] ?></td>
            <td><?php echo $valor["nombre"]." ".$valor["apellidos"] ?></td>
            <td><?php echo $valor["direccion"] ?></td>
            <td><?php echo $valor["telefono"] ?></td>
            <td><?php echo $valor["email"] ?></td>
            <td align="center"><?php echo $valor["rol"] ?></td>
            <td width="25%" class="center"><a href="#" class="btn btn-small"><i class="material-icons">build</i></a>
	          <a href="#" class="btn btn-small"><i class="material-icons">delete</i></a>
	          <a href="#" onclick="vusu('<?php echo $valor['ci'] ?>');" class="btn btn-small"><i class="material-icons">search</i></a></td>
         </tr>
         <?php } ?>	
      </tbody>
   </table> 
</div></div>



  <div id="modal1" class="modal width_modal">
    <div class="modal-content">
      <h4 style="font-family: 'Segoe UI light';">Nuevo Usuario</h4>
      <form id="form_nuevo_usuario" accept-charset="utf-8">

        <div class="file-field input-field col s12">
          <div class="btn">
            <span>Foto</span>
            <input type="file" name="imagen">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>

        </div>
        <div class="input-field col s12">
          <input id="ci" name="ci" type="number" class="validate" required>
          <label for="ci"># Cédula (*)</label>
        </div>
        
        <div class="input-field col s12">
          <input id="nombre" name="nombre" type="text" class="validate" required>
          <label for="nombre">Nombre (*)</label>
        </div>
        <div class="input-field col s12">
          <input id="apellidos" name="apellidos" type="text" class="validate" required>
          <label for="apellidos">Apellidos (*)</label>
        </div>

        <div class="input-field col s12">
          <input id="direccion" name="direccion" type="text" class="validate" required>
          <label for="direccion">Dirección (*)</label>
        </div>
        <div class="input-field col s12">
          <input id="telefono" name="telefono" type="number" class="validate" required>
          <label for="telefono">Teléfono (*)</label>
        </div>
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">E-mail</label>
        </div>

        <div class="input-field col s12">
          <input id="passw" name="passw" type="text">
          <label for="passw">Contraseña de acceso al sistema (*)</label>
        </div>
        <div class="input-field col s12">
          <select name="rol">
            <!-- <option value="" disabled selected>Choose your option</option> -->
            <?php foreach($fila2 as $a  => $valor){ ?>
              <option value="<?php echo $valor['codrol'] ?>"><?php echo $valor["nombre"] ?></option>
            <?php } ?>
          </select>
          <label>Selecciona un rol</label>
        </div>
        <div class="input-field col s12">
          <input id="fnac" name="fnac" type="date" class="validate" required>
          <label for="fnac" class="active">Fecha nacimiento (*)</label>
        </div>

        <div class="left">
          <label style="color: red;">*La CI será Usada como Login para el acceso al sistema.</label>
        </div>
        </form>
      </div>
      <div class="modal-footer col s12">
        <button class="btn waves-effect waves-light right" type="submit" form="form_nuevo_usuario">Agregar</button>
        <a href="#!" class=" modal-action modal-close waves-effect waves-red btn red left">Cancelar</a>
      </div>
      
  </div>


<!-- Modal Ver Usuario -->

<!-- <div id="modal3" class="modal modal-fixed-footer col m12 s8 offset-s2 l4 offset-l4"> -->
  <div class="modal centra_mod" id="modal3">
  <div class="modal-content">

    <div class="center" id="perf_f">
      <img src="" id="foto_perf" class="card-image center" height="100%" width="100%;">
    </div>

    <div class="container">
      <h6><p id="__ci"></p></h6>
      <h6><p id="__nombre"></p></h6>
      <h6><p id="__ap"></p></h6>
      <h6><p id="__fnac"></p></h6>
      <h6><p id="__dir"></p></h6>
      <h6><p id="__telf"></p></h6>
      <h6><p id="__email"></p></h6>
      <h6><p id="__rol"></p></h6>
    </div>
    
  </div>
  <div class="modal-footer">
    <a class="waves-effect modal-action modal-close waves-light btn right" onclick="datos_plato();" >Aceptar</a>
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
    $('#tabla1').dataTable({
      "order": [[ 1, "asc" ]],
        "language": {
        "lengthMenu": "Mostrar _MENU_",
        "zeroRecords": "Lo siento, no se encontraron datos",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay datos disponibles",
        "infoFiltered": "(filtrado de _MAX_ resultados)",
        "paginate": {
          "next": "Siguiente",
          "previous": "Anterior"
        }
       }
    });
    $('.modal').modal();
    $('select').formSelect();
});

var mensaje = $("#mensaje");
mensaje.hide();

$("#form_nuevo_usuario").on("submit", function(e){
  e.preventDefault();

  var formData = new FormData(document.getElementById("form_nuevo_usuario"));
  $.ajax({
    url: "recursos/usuarios/nuevo_usuario.php",
    type: "POST",
    dataType: "HTML",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(echo){
    if (echo == "existe") {
      Materialize.toast("El usuario ya existe." , 4000);
    }else{
      mensaje.html(echo);
      $("#cuerpo").load("templates/usuarios/usuarios.php");
    }
  });
});

function vusu (ci) {
  '<?php foreach($fila as $a  => $valor){ ?>';
    if (ci == "<?php echo $valor['ci'] ?>") {
      $("#__ci").html("<b>Cédula: </b>"+ci);
      $("#__nombre").html("<b>Nombre: </b><?php echo $valor['nombre'] ?>");
      $("#__ap").html("<b>Apellidos: </b><?php echo $valor['apellidos'] ?>");
      $("#__fnac").html("<b>Fecha nac.: </b><?php echo $valor['fnac'] ?>");
      $("#__dir").html("<b>Dirección: </b><?php echo $valor['direccion'] ?>");
      $("#__email").html("<b>Email: </b><?php echo $valor['email'] ?>");
      $("#__telf").html("<b>Teléfono: </b><?php echo $valor['telefono'] ?>");
      $("#__rol").html("<b>ROL: </b><?php echo $valor['rol'] ?>");
      $("#foto_perf").attr("src", "<?php echo $valor['foto'] ?>");
    }

  '<?php } ?>';
  $("#modal3").modal('open');
}

$("#nombre").keyup(function(e) {
  var regex = /^[a-zA-Z áéíóúÁÉÍÓÚ@]+$/;
  if (regex.test(this.value) !== true)
    this.value = this.value.replace(/[^a-zA-Z áéíóúÁÉÍÓÚ@]+/, '');
});
$("#apellidos").keyup(function(e) {
  var regex = /^[a-zA-Z áéíóúÁÉÍÓÚ@]+$/;
  if (regex.test(this.value) !== true)
    this.value = this.value.replace(/[^a-zA-Z áéíóúÁÉÍÓÚ@]+/, '');
});

</script>