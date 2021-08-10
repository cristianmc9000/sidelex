<?php
require('conexion.php');
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$nombreimg = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];

$ruta = "C:/xampp/htdocs/sipl/images";
$ruta = $ruta."/".$nombreimg;
move_uploaded_file($archivo, $ruta);
$ruta2 = "images/".$nombreimg;

$consulta = "INSERT INTO plato (Nombre, Precio, Descripcion, Foto) VALUES ('".$nombre."', '".$precio."', '".$descripcion."' , '".$ruta2."')";
	if(mysqli_query($conexion, $consulta)){
		die('<script>$("#modal1").closeModal(); Materialize.toast("Plato  agregado." , 4000);</script>');
	} else {
		die('Error');
	}
?>