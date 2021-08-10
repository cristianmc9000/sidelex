<?php
require('conexion.php');

$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];

$consulta = "INSERT INTO cliente (Ci, Nombre, Apellidos, Telefono) VALUES ('".$ci."', '".$nombre."', '".$apellidos."', '".$telefono."')";
	if(mysqli_query($conexion, $consulta)){
		die('<script>$("#modal1").closeModal(); Materialize.toast("Cliente agregado." , 4000);</script>');
	} else {
		die('Error');
	}
?>