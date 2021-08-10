
<?php
require('recursos/conexion.php');

$Sql = "SELECT * FROM empresa where Estado = 1;"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('code'=>$arr['Code'], 'nombre'=>$arr['Nombre'], 'dir'=>$arr['Direccion'], 'telf'=>$arr['Telefono']); 
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

<span class="fuente"><h3>Empresas
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
              <th>Dirección</th>
              <th>Teléfono</th>
              
              <th>Acciones</th>
  <!--        <th>Borrar</th>
            	<th>Ver Usuario</th> -->
           </tr>          
        </thead>
        <tbody>
        	 <?php foreach($fila as $a  => $valor){ ?>
           <tr>
              
              <td align="center"><?php echo $valor["code"]?></td>
              <td align="center"><?php echo $valor["nombre"] ?></td>
              <td align="center"><?php echo $valor["dir"] ?></td>
              <td align="center"><?php echo $valor["telf"] ?></td>
              <td><a href="#"><i class="material-icons">build</i></a>
  	          <a href="#"><i class="material-icons">delete</i></a>
  	          <a href="#"><i class="material-icons">search</i></a></td>
           </tr>
           <?php } ?>	
        </tbody>
     </table> 
   </div>
</div>

<script>
$(document).ready(function() {
    $('#tabla1').dataTable();
    //$('#modal').leanModal();
});

</script>