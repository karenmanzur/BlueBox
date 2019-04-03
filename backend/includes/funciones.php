<?php 
require_once("db_con.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;

	case 'consultar_usuarios':
	consultar_usuarios();
	break;

	case 'insertar_usuarios':
	insertar_usuarios();
	break;

	case 'eliminar_registro':
		eliminar_usuario($_POST['id']);
		break;

	case 'consultar_registro':
		consultar_registro($_POST['id']);
		break;

	default:
		
	break;
}

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
        $_SESSION['usuario'] = $correo;
  
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