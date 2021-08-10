<?php 
require('conexion.php');

$cod = $_POST['cod_pedido'];


$consulta = "DELETE FROM pedido WHERE  Codped = ".$cod."";
$consulta2 = "DELETE FROM det_ped WHERE  Codped = ".$cod."";
mysqli_query($conexion, $consulta2) or die(mysql_error());
mysqli_query($conexion, $consulta) or die(mysql_error());


die("<script>Materialize.toast('Su pedido ha sido eliminado.', 4000); $('#modal_cancelar_pedido').closeModal();</script>");




?>