<?php 
	require_once("conectar.php");
	require_once("funciones.php");

	$texto = $_POST['texto'];
	$id = $_POST['id'];
	updateNiveles($texto,  $id);
	header("Location: sliders.php");
?>