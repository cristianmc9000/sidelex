<?php 
	require('../conexion.php');

	$idcli = $_GET['idcli'];
	$result = $conexion->query('UPDATE cliente SET Estado = 0 WHERE id = '.$idcli);

	echo $result.'';
?>
