<?php 

//$conexion = mysqli_connect('localhost','root','','dbpl');
$conexion = new mysqli('localhost','u604223767_cristian','Desconocido1','u604223767_dppl'); //agregado desde sublime

$conexion->query("SET NAMES 'utf8'");
if($conexion->connect_error) { 
    die( 'Error: ('. $conexion->connect_errno .' )'. $conexion->connect_error); 
}
?>
