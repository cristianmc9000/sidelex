<?php
require('../conexion.php');
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$fnac = $_POST['fnac'];
$nombreimg = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];


$password = $_POST['passw'];

if(!empty($archivo)){
$ruta = "C:/xampp/htdocs/almacen/images";
$ruta = $ruta."/".$nombreimg;
move_uploaded_file($archivo, $ruta);
$ruta2 = "images/".$nombreimg;
}else{
	$ruta2 = "images/defecto.png";
}

$cVU = "SELECT COUNT(*) as conteo FROM usuario WHERE Ci = ".$ci;
$rVU = mysqli_query($conexion, $cVU) or die(mysql_error());
$dVU = mysqli_fetch_array($rVU);
if($dVU['conteo'] > 0){
	die('existe');
}

$consulta = "INSERT INTO usuario (Ci, Nombre, Apellidos, Direccion, Telefono, Email, Fecha_nac, Foto, Codrol) VALUES ('".$ci."', '".$nombre."', '".$apellidos."' , '".$direccion."' , '".$telefono."' , '".$email."' , '".$fnac."' , '".$ruta2."' , '".$rol."')";
	if(mysqli_query($conexion, $consulta)){
		$consulta2 = "INSERT INTO datos (Ci, Usuario, Password) VALUES ('".$ci."', '".$ci."', '".$password."')";
		mysqli_query($conexion, $consulta2);
		die('1');
	} else {
		die(mysqli_error($conexion));
	}
?>