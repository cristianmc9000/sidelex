<?php 
require('../sesiones.php');
require('../conexion.php');
session_start();
date_default_timezone_set("America/La_Paz");
$fecha_actual = date("Y-m-d H:i:s");

$id = $_SESSION['id_cliente'];

$consulta = "SELECT * FROM pedido WHERE idcli = '".$id."' ORDER BY Codped DESC LIMIT 1;";
$resultadoVP = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
$rvp = mysqli_fetch_array($resultadoVP);

// $_SERVER["REQUEST_TIME"]

$nuevo = strtotime($fecha_actual) - strtotime($rvp['Fecha']);

if (($nuevo < 1800)  && ($rvp['Estado'] == '0')) {
	$array = $rvp['Total'].",".$rvp['Fecha'].",".$rvp['Codped'].",ACEPTADO";
	die($array);
}


if ($rvp['Estado'] == 1) {

	$array = $rvp['Total'].",".$rvp['Fecha'].",".$rvp['Codped'].",PENDIENTE";
	die($array);
}else{
	die("sinpedidos");
}

?>