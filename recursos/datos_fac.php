<?php 
require('conexion.php');
require_once('factura/CodigoControlV7.php');

$codped = $_POST['codped']; //para bd factura
$fecha = $_POST['fechax']; //para bd factura
$hora = $_POST['horax']; //para bd factura

$nit_cliente = $_POST['cix']; //para bd factura
$numero_autorizacion = $_POST['autx'];
$fecha_c = $_POST['fechax'];
$monto_compra = $_POST['montox'];
$clave = $_POST['llavex'];



$fecha_compra = strtotime(str_replace("/", "-", $fecha_c));

$consultaNumFac = "SELECT count(*) as numfac FROM factura WHERE Estado = 1";
$resultadoConsultaNF = mysqli_query($conexion, $consultaNumFac) or die(mysql_error());
$datosCNF = mysqli_fetch_array($resultadoConsultaNF);

$numero_factura = (int)$datosCNF['numfac'] + 1; //para bd factura

$codigo_control = CodigoControlV7::generar($numero_autorizacion, $numero_factura, $nit_cliente, $fecha_compra, $monto_compra, $clave);


// die($codped.",".$fecha.",".$hora.",".$nit_cliente.",".$numero_factura);

$consultaInsertarNuevaFactura = "INSERT INTO factura (Codtal, Codp, Ci_cli, Fecha, Hora, Nro_fac) VALUES((SELECT MAX(Codtal) FROM talonario WHERE Estado = 1), ".$codped.", ".$nit_cliente.", '".$fecha."', '".$hora."', ".$numero_factura.")";	

	if(mysqli_query($conexion, $consultaInsertarNuevaFactura)){
		die($codigo_control.','.$numero_factura);
		
	} else {
		die('<script>Materialize.toast("OCURRIÓ UN ERROR...");</script>');
	}






?>