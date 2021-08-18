 <?php
require('recursos/conexion.php');

$Sql = "SELECT a.Codv, a.Ciusu, a.Cicli, a.Fecha, a.Total, b.Nombre, b.Apellidos FROM venta a, cliente b WHERE a.Cicli = b.Ci AND a.Estado = 1"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('codv'=>$arr['Codv'], 'usuario'=>$arr['Ciusu'], 'cliente'=>$arr['Cicli'], 'nombrecli'=>$arr['Nombre'], 'apcli'=>$arr['Apellidos'], 'fecha'=>$arr['Fecha'], 'total'=>$arr['Total']); 
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

  table.highlight > tbody > tr:hover {
    background-color: #a0aaf0 !important;
  }

#tab_det{
border: 1px solid black;
}

#modal2{
width: 40%;
overflow-x: hidden;
}
</style>

<span class="fuente"><h3>Ventas
  <a href="#" class="waves-effect waves-light btn-floating btn-large red" id="nv_venta"><i class="material-icons left">add</i></a></h3>
</span>

<div class="row">
  <div class="col s12 m12 l12">
 <table id="tabla1" class="highlight">
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
        <td align="center"><?php echo $valor["cliente"] ?></td>
        <td align="center"><?php echo $valor["total"] ?></td>
        <td align="center"><?php echo $valor["fecha"] ?></td>
        <td align="center"><a href="#" class="btn-floating" onclick="ver_ped('<?php echo $valor['codv'] ?>','<?php echo $valor["cliente"] ?>','<?php echo $valor['nombrecli'] ?>', '<?php echo $valor['apcli'] ?>');"><i class="material-icons">search</i></a></td>
     </tr>
     <?php } ?>	
  </tbody>
</table> 
</div>
</div>

<!-- Modal Ver Venta -->
<div id="modal2" class="modal">

  <div class="modal-content">
    <h4 class="center"><b>Ver Venta</b></h4>
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
    </table>

    <div class="container"><b><p id="total_ped" class="right"></p></b></div>
  </div>
<br>
<div class="row">
  <div class="modal-footer col s12">
    <a href="#!" class="right modal-action modal-close waves-effect waves-light btn-large">Aceptar</a>
  </div>
</div>

</div>


<script>
$(document).ready(function() {
    $('#tabla1').dataTable({
      "order": [[ 0, "desc" ]]
    });
    $('.modal').modal();
});
$( "#nv_venta" ).click(function() {
  $("#cuerpo").load("recursos/nueva_venta.php");
});


function ver_ped(cod, cicli, nombrecli, apcli) {
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