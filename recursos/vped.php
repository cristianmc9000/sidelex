<?php 
require('conexion.php');

$ci = $_POST['ci'];
if (empty($ci)) {
	die("2");
}


$consulta = "SELECT * FROM pedido WHERE Cicli = '".$ci."' AND (SELECT MAX(Codped) FROM pedido) ORDER BY Codped DESC LIMIT 1;";
$resultadoVP = mysqli_query($conexion, $consulta) or die(mysql_error());
$rvp = mysqli_fetch_array($resultadoVP);


$nuevo = $_SERVER["REQUEST_TIME"] - strtotime($rvp['Fecha']);


if (($nuevo < 1800)  && ($rvp['Estado'] == '0')) {
	// die("<script>$('#actped').css('color', '#00ff00');$('#actped').html('Tu pedido ha sido aceptado, y enviado.');$('#totped').html('Total: '+".$rvp['Total']."+'Bs.');$('#fecha_ped').html('Fecha: '+'".$rvp['Fecha']."');</script>");
	$array = $rvp['Total'].",".$rvp['Fecha'].",".$rvp['Codped'].",ACEPTADO";
	die($array);
}


if ($rvp['Estado'] == 1) {
	// die("<script>$('#actped').css('color', 'yellow');$('#actped').html('Tienes 1 pedido pendiente, tu pedido aun no ha sido aceptado.');$('#totped').html('Total: '+".$rvp['Total']."+'Bs.');$('#fecha_ped').html('Fecha: '+'".$rvp['Fecha']."');</script>");
	$array = $rvp['Total'].",".$rvp['Fecha'].",".$rvp['Codped'].",PENDIENTE";
	die($array);
}else{
	die("sinpedidos");
}

?>