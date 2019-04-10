<?php 
	require_once("conectar.php");
	require_once("funciones.php");

	$texto = $_POST['texto'];
	insertNivel($texto);
	header("Location: sliders.php");
?>