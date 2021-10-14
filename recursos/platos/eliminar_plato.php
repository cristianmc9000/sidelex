<?php 
require('../conexion.php');

$codp = $_GET['codpla'];

$result = $conexion->query('DELETE FROM `plato` WHERE Codpla = '.$codp);
echo $result;

?>