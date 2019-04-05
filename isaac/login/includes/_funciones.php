<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	
	//feature
	case 'carga_foto':
	carga_foto();
	break;
	case 'consultar_features':
	consultar_features();
	break;
	case 'insertar_features':
	insertar_features();
	break;
	case 'eliminar_features':
	eliminar_features($_POST["id"]);
	break;
	case 'ceditar_features':
	ceditar_features($_POST["id"]);
	break;
	case 'editar_features':
	editar_features($_POST["id"]);
	break;


	default:
	break;
}

/////FEATURES
function consultar_features(){
	global $mysqli;
	$consulta = "SELECT * FROM features";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_features(){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "INSERT INTO features VALUES('','$img_fe','$titulo_fe','$subtitulo_fe')";
	$resultadoin = mysqli_query($mysqli, $consultain);

	echo "Se inserto Feature en la BD"; //Imprime el JSON ENCODEADO
}


function eliminar_features($id){
	global $mysqli;
	$consulta = "DELETE FROM features WHERE id_fe = $id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elimino correctamente";
	}
	else{
		echo "Se genero un error intenta nuevamente";
	}
}
function ceditar_features($id){
	global $mysqli;
	$consulta = "SELECT * FROM features WHERE id_usr = '$id'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	    echo json_encode($fila);
	}

function editar_features($id){
	global $mysqli;
	$img_fe = $_POST["imagen"];
	$titulo_fe = $_POST["titulo"];	
	$subtitulo_fe = $_POST["subtitulo"];	
	$consultain = "UPDATE features SET img_fe = '$img_fe',titulo_fe= '$titulo_fe', subtitulo_fe = '$subtitulo_fe' WHERE id_fe = $id";
	$resultadoin = mysqli_query($mysqli, $consultain);
    echo "Se edito Feature correctamente";
}
function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/usuarios/";
		$respuesta = [
			"archivo" => "img/usuarios/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/usuarios/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}


function login(){
		global $mysqli;

		$correo = $_POST["correo"];
		$pass = $_POST["password"];	

		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{

				echo "[2]";

			}


		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();

				echo "[0]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{

					echo "[1]"	;
					session_start();
					error_reporting(0);

					$_SESSION['usuarios']=$correo;
					echo $correo;
					echo $_SESSION['usuarios'];
  					
					
				}
			}

?>