 <?php
require('../../recursos/conexion.php');

$Sql = "SELECT a.Codv, a.Ciusu, b.Ci, a.idcli, a.Fecha, a.Total, b.Nombre, b.Apellidos FROM venta a, cliente b WHERE a.idcli = b.id AND a.Estado = 1"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('codv'=>$arr['Codv'], 'usuario'=>$arr['Ciusu'], 'cicli'=>$arr['Ci'],'cliente'=>$arr['idcli'], 'nombrecli'=>$arr['Nombre'], 'apcli'=>$arr['Apellidos'], 'fecha'=>$arr['Fecha'], 'total'=>$arr['Total']); 
    } 

$Sql2 = "SELECT a.Codv, a.Codpla, a.Cantidad, a.Precio, b.Nombre FROM det_plato a, plato b WHERE a.Codpla = b.Codpla;";
$Busq2 = $conexion->query($Sql2);
while($arr2 = $Busq2->fetch_array())
{
$fila2[] = array('cod'=>$arr2['Codv'], 'codpla'=>$arr2['Codpla'], 'cant'=>$arr2['Cantidad'], 'precio'=>$arr2['Precio'], 'nombre'=>$arr2['Nombre']);
}

?>


<style>
  .fuente{
  	font-family: 'Segoe UI light';
  	color: red;
  }

/*  table.highlight > tbody > tr:hover {
    background-color: #a0aaf0 !important;
  }*/

#tab_det{
border: 1px solid black;
}

#modal2{
/*width: 40%;
overflow-x: hidden;*/
}
</style>

<span class="fuente"><h3>Ventas
  <a href="#" class="waves-effect waves-light btn-floating btn-large red" id="nv_venta"><i class="material-icons-outlined left">add</i></a></h3>
</span>

<div class="row">
  <div class="col s12 m12 l12">
 <table id="tabla1" class="highlight content-table">
  <thead>
     <tr>
        <th>Código de venta</th>
        <th>Usuario</th>
        <th>Cliente</th>
        <th>Total</th>
        <th>Fecha</th>
        <th>Acciones</th>
     </tr>          
  </thead>
  <tbody>
  	 <?php foreach($fila as $a  => $valor){ ?>
     <tr>
        <td align="center"><?php echo $valor["codv"] ?></td>
        <td align="center"><?php echo $valor["usuario"] ?></td>
        <td align="center"><?php echo $valor["nombrecli"]." ".$valor["apcli"] ?></td>
        <td align="center"><?php echo $valor["total"] ?> Bs.</td>
        <td align="center"><?php echo date('d-m-Y', strtotime($valor['fecha'])) ?></td>
        <td align="center">
          <a href="#!" onclick="eliminar_venta('<?php echo $valor['codv'] ?>')" class="btn-floating"><i class="material-icons">delete</i></a>
          <a href="#" class="btn-floating" onclick="ver_ped('<?php echo $valor['codv'] ?>','<?php echo $valor["cliente"] ?>','<?php echo $valor["cicli"] ?>','<?php echo $valor['nombrecli'] ?>', '<?php echo $valor['apcli'] ?>');"><i class="material-icons">search</i></a>
        </td>
     </tr>
     <?php } ?>	
  </tbody>
</table> 
</div>
</div>

<!-- Modal Ver Venta -->
<div id="modal2" class="modal">

  <div class="modal-content">
    <h4 class="center"><b>Ver venta</b></h4>
    <h5><p id="__ci"></p></h5>
    <h5><p id="__cli"></p></h5>
    <!-- <h5><p id="__telf"></p></h5> -->
    
    <table id="tab_det" >
      <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
      </tr>
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
      </tr>
    </table><br>  
    <div class="container"><b><span id="total_ped" class="right"></span></b></div>
  </div>

  <div class="modal-footer">
    <a href="#!" class="right modal-action modal-close waves-effect waves-light btn-large">Aceptar</a>
  </div>
</div>

<!-- MODAL eliminar pedido -->
<div id="modal_elim" class="modal">

  <div class="modal-content">
    <h4 class="roboto">Se eliminaran los datos de la venta seleccionada.</h4>
    <p class="rubik">Se anulará la factura y se dará de baja la venta.</p>
    <input type="text" id="id_ped" hidden>

  </div>

  <div class="modal-footer">
    <a href="#!" class="left modal-action modal-close waves-effect waves-light btn red">Cancelar</a>
    <button class="waves-effect waves-light btn right" id="elimped">Confirmar</button>
  </div>
</div>


<script>
$(document).ready(function() {
    $('#tabla1').dataTable({
      "order": [[ 0, "desc" ]],
        "language": {
        "lengthMenu": "Mostrar _MENU_ ",
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
});
$( "#nv_venta" ).click(function() {
  $("#cuerpo").load("templates/ventas/nueva_venta.php");
});


function eliminar_venta(id) {
  $("#id_ped").val(id);
  $("#modal_elim").modal('open');
}
$("#elimped").click(function (argument) {
  let id = $("#id_ped").val();
  $.ajax({
    url: "recursos/ventas/eliminar_venta.php?id="+id,
    method: "get",
    success: function(response){
      console.log(response)
      if (response == '1') {
        M.toast({html: 'La venta y su detalle ha sido eliminada.'})
        $("#modal_elim").modal('close')
        $("#cuerpo").load("templates/ventas/ventas.php");
      }
    },
    error: function(error, data, response){
      console.log(error)
    }
  });
})

function ver_ped(cod, idcli, cicli, nombrecli, apcli) {
  $("#__ci").html("<b>Cédula: </b>"+cicli);
  $("#__cli").html("<b>Cliente: </b>"+nombrecli+" "+apcli);


  $('#tab_det tr:not(:first-child)').slice(0).remove();
  var table = $("#tab_det")[0];
  total =  0;
  //llenando tabla
  "<?php foreach($fila2 as $a  => $valor){ ?>";
  if(cod == "<?php echo $valor['cod'] ?>"){
  var row = table.insertRow(1);
  row.insertCell(0).innerHTML = "<?php echo $valor['precio'] ?>";
  row.insertCell(0).innerHTML = "<?php echo $valor['cant'] ?>";
  row.insertCell(0).innerHTML = "<?php echo $valor['nombre'] ?>";
  total  = parseInt(total) + (parseInt("<?php echo $valor['precio'] ?>")*(parseInt("<?php echo $valor['cant'] ?>")));
  }
  "<?php } ?>";
  $("#total_ped").html("Total: "+total +" Bs.");
  $("#modal2").modal('open');
}

</script>