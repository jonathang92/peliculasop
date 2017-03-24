<?php
$database="peliculasop";
$conexion = @mysqli_connect("localhost","root","","peliculasop") or die(mysqli_connect_error());
$con = @mysqli_connect("localhost","root","","peliculasop");
$conexion->set_charset("utf8");

if(!$conexion) {

	echo 'Error al conectar a la base de datos';
}
?>
