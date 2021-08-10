<?php 

//$conexion = mysqli_connect('localhost','root','','dbpl');
$conexion = mysqli_connect('localhost','u604223767_cristian ','Desconocido1','u604223767_dppl '); //agregado desde sublime

if($conexion === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>