<?php

require('../conexion.php');
require('../sesiones.php');
session_start();

$ciusu = $_SESSION['Ci_Usuario'];
$total = $_GET['subtotal'];
$json = json_decode($_GET['json']);

// die(var_dump(json_decode($json)));

// $ci = $_POST['ci_cliente'];
// $nombre = $_POST['nombre_cliente'];
// $ap = $_POST['ap_cliente'];
// $telf = $_POST['telf'];
// $total = $_POST['tot_ped'];
// $cont = $_POST['cont'];

// $consultaVC = "SELECT * FROM cliente WHERE Ci = ".$ci."";
// $resultadoCVC = mysqli_query($conexion, $consultaVC) or die(mysqli_error($conexion));
// $dvc = mysqli_fetch_array($resultadoCVC);

// if (!$dvc) {
// 	$consultaIC = "INSERT INTO cliente (Ci, Nombre, Apellidos, Telefono) VALUES ('".trim($ci)."', '".trim($nombre)."', '".trim($ap)."', '".trim($telf)."')";
// 	$resultadoCIC = mysqli_query($conexion, $consultaIC) or die(mysql_error());
// }else if (!(trim($ci) == $dvc["Ci"] and trim($nombre) == $dvc["Nombre"] and trim($ap) == $dvc["Apellidos"])) {
//  	die('<script>Materialize.toast("El número de cédula no coincide con el nombre y apellidos." , 4000);</script>');
// }


$consulta = "INSERT INTO venta(Ciusu, idcli, Total) VALUES(".$ciusu.", '1', ".$total.")";
	if(mysqli_query($conexion, $consulta)){

		// $cOC = "SELECT MAX(Codv) as codv FROM venta WHERE Cicli = '".$ci."' AND Estado = 1";
		// $rCOC = mysqli_query($conexion, $cOC) or die(mysqli_error($conexion));
		// $roc = mysqli_fetch_array($rCOC);
		$lastid = mysqli_insert_id($conexion);
		// for ($v=0; $v < $cont; $v++) { 
		// 	$cDV = "INSERT INTO det_plato (Codpla, Codv, Cantidad, Precio) VALUES (".$_POST[$v].", ".$roc['codv'].", ".$_POST[$v.'c'].", (SELECT Precio FROM plato WHERE Codpla = ".$_POST[$v]."))";
		// 	if(!(mysqli_query($conexion, $cDV))) {die($_POST[$v]."--".$roc['codv']."--".$_POST[$v.'c']);}
		// }

		foreach ($json as $key => $value) {
			$consulta_detven = "INSERT INTO det_plato (Codpla, Codv, Cantidad, Precio) VALUES (".$value[0].", ".$lastid.", ".$value[2].", (SELECT Precio FROM plato WHERE Codpla = ".$value[0]."))";
			if(!(mysqli_query($conexion, $consulta_detven))) {die('<script>M.toast({html: "Error en consulta inserción detalle pedido"});</script>');}
		}

		die($lastid.'');
	} else {
		die('error');
	}




// die($ci."--".$nombre."--".$ap."--".$telf."--".$total."--".$cont."--".$_POST['1']."--".$_POST['1c']);

?>