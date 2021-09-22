<?php
require('conexion.php');

// $ci = $_POST['ci_cliente'];
// $nombre = $_POST['nombre_c'];
// $ap = $_POST['ap_c'];
$telf = $_GET['telf'];
$total = $_GET['subtotal'];
// $cont = $_POST['cont'];
$colat = $_GET['colat'];
$colng = $_GET['colng'];
$json = $_GET['json'];




die($telf."---".$total."---".$colat."---".$colng."---".var_dump(json_decode($json)));



$consultaVP = "SELECT * FROM pedido WHERE Cicli = ".$ci." AND (SELECT MAX(Codped) FROM pedido) ORDER BY Codped DESC LIMIT 1";
$resultadoVP = mysqli_query($conexion, $consultaVP) or die(mysql_error());
$rvp = mysqli_fetch_array($resultadoVP);

if ($rvp['Estado'] == 1) {
	die('<script>Materialize.toast("Usted ya tiene un pedido activo." , 4000);</script>');
}

if (($_SERVER["REQUEST_TIME"] - strtotime($rvp['Fecha'])) < 1800) {
	die('<script>Materialize.toast("Usted realizó un pedido recientemente, Espere unos minutos." , 4000);</script>');
}


if (intval($telf) < 40000000) {
	die('<script>Materialize.toast("Ingrese un número de teléfono válido." , 4000);</script>');
}

$consultaAC = "UPDATE cliente SET Telefono = '".$telf."' WHERE Ci = '".$ci."'";
$resultadoCAC = mysqli_query($conexion, $consultaAC) or die(mysql_error());


$consultaAP = "INSERT INTO pedido (Cicli, Total, Lat, Lng) VALUES ('".$ci."', '".$total."', '".$colat."', '".$colng."')";
if(mysqli_query($conexion, $consultaAP)){


	$cOC = "SELECT Codped FROM pedido WHERE Cicli = '".$ci."' AND Estado = 1";
	$rCOC = mysqli_query($conexion, $cOC) or die(mysql_error());
	$roc = mysqli_fetch_array($rCOC);
	for ($v=0; $v < $cont; $v++) { 
		$cDP = "INSERT INTO det_ped (Codped, Codpla, Cant, Precio) VALUES (".$roc['Codped'].", ".$_POST[$v].", ".$_POST[$v.'c'].", (SELECT Precio FROM plato WHERE Codpla = ".$_POST[$v]."))";
		if(!(mysqli_query($conexion, $cDP))) {die('<script>Materialize.toast("Error#1" , 4000);</script>');}
	}
	die('realizado');
} else {
	die('<script>Materialize.toast("Error#2" , 4000);</script>');
}

?>