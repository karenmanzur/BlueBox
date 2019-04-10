<?php 
require_once("db_con.php"); //Conexion a la base de datos
switch ($_POST["accion"]) { 
	case 'login':  //case para el login
	login();
	break;

	case 'consultar_usuarios': //consultar usuarios
	consultar_usuarios();
	break;

	case 'insertar_usuarios': //insertar usuarios
	insertar_usuarios();
	break;

	case 'eliminar_registro': //eliminar registro
	eliminar_usuario($_POST['id']);
	break;

	case 'consultar_registro':
	consultar_registro($_POST['id']);
	break;

	case 'editar_usuarios': //editar registro
	editar_usuarios($_POST['id']);
	break;

//FUNCIONES KAREN
	case 'consultar_works':
	consultar_works();
	break;

	case 'editar_works':
	editar_works($_POST['id']);
	break;

	case 'eliminar_works':
	eliminar_works($_POST['id']);
	break;

	case 'consultar_test':
	consultar_test($_POST['id']);
	break;

	case 'carga_foto':
	carga_foto();
	break;

	default:
		
	break;
}
//Funciones generales
function login(){
	global $mysqli;
	$correo = $_POST['correo']; 
	$password = $_POST['password'];
	$consulta = "SELECT * FROM usuarios WHERE correo_user ='$correo'";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	if($fila["pass_user"] == "$password" ){
		
		session_start();
        error_reporting(0);
        $_SESSION['usuarios'] = $correo;
  
        echo "1"; 
      }
    else 
      {
        echo "Error en la contraseña o usuario";
      }
	}

function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}

function insertar_usuarios(){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    global $mysqli;
    if ($nombre!=''&&$correo!=''&&$telefono!=''&&$password!='') {
        $verif = "SELECT * FROM usuarios WHERE correo_user = '$correo'";
        $resultado = $mysqli->query($verif);
        if ($resultado->num_rows == 0) {
            $query = "INSERT INTO usuarios VALUES('','$nombre','$correo','$telefono','$password','1')";
            $data = $mysqli->query($query);
            echo "Se agregó correctamente al usuario";
        } else{
            echo "El correo ya existe. Intentelo nuevamente";
        }
    }
}

function eliminar_usuario($id){
	global $mysqli;
	$query = "DELETE FROM usuarios WHERE id_user = $id";
	$resultado = mysqli_query($mysqli, $query);
	if ($resultado) {
		echo "1";
	} else {
		echo "0";
	}
}

function consultar_registro($id){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios where id_user = $id LIMIT 1";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	echo json_encode($fila); 
}

function editar_usuarios(){
	global $mysqli;
	extract($_POST);
	$consulta = "UPDATE usuarios SET nombre_user = '$nombre', correo_user = '$correo', 
	pass_user = '$password', tel_user = '$telefono' WHERE id_user = '$id' ";
	$resultado = mysqli_query($mysqli, $consulta);
	if($resultado){
		echo "Se editó correctamente";
	}else{
		echo "Se generó un error, intentalo nuevamente";
	}
}


//Funciones Works - Karen
function consultar_works(){
	global $mysqli;
	$consulta = "SELECT * FROM works";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}

function consultar_test($id){
	global $mysqli;
	$consulta = "SELECT * FROM works WHERE works_id = $id LIMIT 1";
	$resultado = mysqli_query($mysqli, $consulta);
	$fila = mysqli_fetch_array($resultado);
	echo json_encode($fila); 
}

function editar_works($id){
  global $mysqli;
  extract($_POST);
  $consulta = "UPDATE works SET works_file = '$ruta', works_subtitle = '$texto', works_title = '$nombre' WHERE works_id = '$id' ";
  $resultado = mysqli_query($mysqli, $consulta);
  if($resultado){
    echo "Se editó correctamente";
  }else{
    echo "Se generó un error, intentalo nuevamente";
  }
}

 function eliminar_works($id){
  global $mysqli;
  $query = "DELETE FROM works WHERE works_id = $id";
  $resultado = mysqli_query($mysqli, $query);
  if ($resultado) {
    echo "1";
  } else {
    echo "0";
  }
}

function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../../img";
		$respuesta = [
			"archivo" => "../img/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}
//Fin Funciones Works - Karen