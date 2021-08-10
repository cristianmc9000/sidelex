<?php 
require('conexion.php');
$cod = $_POST['codx'];



	$Sql = "SELECT a.Codv, a.Cicli, a.Total, b.Nombre, b.Apellidos, b.Telefono FROM venta a, cliente b WHERE a.Codv = ".$cod." AND a.Cicli = b.Ci;";
	$resultado = mysqli_query($conexion, $Sql) or die(mysql_error());
	$datos = mysqli_fetch_array($resultado);

die($datos['Codv'].",".$datos['Cicli'].",".$datos['Total'].",".$datos['Nombre'].",".$datos['Apellidos'].",".$datos['Telefono']);

?>