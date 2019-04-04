<?php 
include_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
		login();
		break;
	case 'carga_foto':
		carga_foto();
		break;
		//WHAT WE DO
	case 'consultar_whatwedos':
		consultar_whatwedos();
		break;
	case 'consultar_whatwedo':
		consultar_whatwedo($_POST['id']);
		break;
	case 'insertar_whatwedo':
		insertar_whatwedo();
		break;
	case 'editar_whatwedo':
		editar_whatwedo();
		break;
	case 'eliminar_whatwedo':
		eliminar_whatwedo($_POST['id']);
		break;
		
		default:
		break;
}

function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/carga/";
		$respuesta = [
			"archivo" => "img/logo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/carga/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}

//WHAT WE DO PART

function consultar_whatwedos()
{
	global $mysqli;
	$query = "SELECT * FROM whatwedo";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function consultar_whatwedo($id)
{
	global $mysqli;
	$query = "SELECT * FROM whatwedo WHERE id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}

function insertar_whatwedo()
{  
	global $mysqli;
	$titulo = $_POST["titulo"];
	$icono  = $_POST["foto"];
	$texto = $_POST["texto"];
	$ruta = $_POST["ruta"];
	
	
	if (empty($titulo) && empty($foto) && empty($texto)){
		echo "0";
	} elseif (empty($titulo)) {
		echo "0";
	} elseif (empty($icono)) {
		echo "0";
	} elseif (empty($texto)) {
		echo "0";
	} else {
		$query = "INSERT INTO whatwedo VALUES ('','$titulo','$ruta','$texto')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}

function editar_whatwedo()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE whatwedo SET titulo = '$titulo', icono = '$ruta', texto = '$texto'
	WHERE id = '$id'";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}

function eliminar_whatwedo($id)
{
	global $mysqli;
	$query = "DELETE FROM whatwedo WHERE id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
 