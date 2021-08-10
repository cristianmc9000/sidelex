<?php
	
//Conectamos a la base de datos
require('conexion.php');

//Obtenemos los datos del formulario de acceso
$userPOST = $_POST["userAcceso"]; 
$passPOST = $_POST["passAcceso"];



//Filtro anti-XSS
// $userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
// $passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresUsername = "10";
$maxCaracteresPassword = "60";

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($userPOST) > $maxCaracteresUsername) {
	die('<script>$("#modal1").openModal();</script> El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($passPOST) > $maxCaracteresPassword) {
	die('<script>$("#modal1").openModal();</script> La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};


//Escribimos la consulta necesaria
$consulta = "SELECT * FROM datos WHERE Usuario='".$userPOST."'";

//Obtenemos los resultados
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$ciBD = $datos['Ci'];
$userBD = $datos['Usuario'];
$passwordBD = $datos['Password'];



//Comprobamos si los datos son correctos
if($userBD == $userPOST and  $passPOST == $passwordBD){



	session_start();
	$_SESSION['Ci_Usuario'] = $ciBD;
	$consultaNA = "SELECT Nombre, Apellidos, Foto FROM usuario WHERE Ci = ".$ciBD.";";
	$resultadoNA = mysqli_query($conexion, $consultaNA);
	if(empty($resultadoNA)){
		$datosNA = array('Nombre' => '', 'Apellidos' => '', 'Foto' => '', 'estado' => '', 'user' => '');
	}else{
		$datosNA = mysqli_fetch_array($resultadoNA) or die("Error...");
	}
	
	$_SESSION['Nombre'] = $datosNA['Nombre'];
	$_SESSION['Apellidos'] = $datosNA['Apellidos'];
	$_SESSION['estado'] = 'Autenticado';
	$_SESSION['user'] = $userBD;
	$_SESSION['Foto'] = $datosNA['Foto'];

	die();
	/* Sesión iniciada, si se desea, se puede redireccionar desde el servidor */

//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else {
	die('<script>Materialize.toast("Datos de acceso incorrectos.", 4000)</script>');
}

?>
<!-- AGREGAR TABLA INSUMOS CON TODOS LOS GASTOS DEL DIA, PARA LUEGO HACER UNA DIFERENCIA CON LA GANANCIA DEL DIA TOTAL -->