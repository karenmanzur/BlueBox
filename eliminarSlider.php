<?php 
	require_once("conectar.php");
	require_once("funciones.php");
	$id = $_GET['id'];
	eliminar('slider', 'id', $id);
	header("Location:sliders.php");
?>