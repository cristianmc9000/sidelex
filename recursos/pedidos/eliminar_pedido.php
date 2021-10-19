<?php 
require("../conexion.php");

$id = $_GET['id'];

$result = $conexion->query("UPDATE pedido SET Estado = 2 WHERE Codped = ".$id);

echo $result.'';
?>