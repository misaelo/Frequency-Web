<?php
require_once("../conexion/bd.php");
require_once("../controlador/clinica.controlador.php");


$bandera = $_POST['bandera'];

switch ($bandera) {
	case '1':

		$id = $_POST['id_clinica'];
		$pass = $_POST['contrasena_clinica'];
		$nombre = $_POST['nombre_clinica'];
		$region = $_POST['region_clinica'];
		$comuna = $_POST['comuna_clinica'];
		$direccion = $_POST['direccion_clinica'];
		$telefono = $_POST['telefono_clinica'];
		$correo = $_POST['correo_clinica'];


		Agregar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo);
		
		echo 'la información se guardo correctamente';

	break;

	case '2':

		$id;
		$pass;
		$nombre;
		$region;
		$comuna;
		$direccion;
		$telefono;
		$correo;

		foreach(Buscar_Clinica($_POST['id']) as $Clinica){

			$id = $Clinica['id_clinica'];
			$pass = $Clinica['pass'];
			$nombre = $Clinica['nombre'];
			$region = $Clinica['region'];
			$comuna = $Clinica['comuna'];
			$direccion = $Clinica['direccion'];
			$telefono = $Clinica['telefono'];
			$correo = $Clinica['correo'];
		}

		$arreglo = array();
		$arreglo[0] = $id;
		$arreglo[1] = $pass;
		$arreglo[2] = $nombre;
		$arreglo[3] = $region;
		$arreglo[4] = $comuna;
		$arreglo[5] = $direccion;
		$arreglo[6] = $telefono;
		$arreglo[7] = $correo;

		echo json_encode($arreglo);
		exit();

	break;


	case '3':

		$id = $_POST['id'];
		$pass = $_POST['contrasena'];
		$nombre = $_POST['nombre'];
		$region = $_POST['region'];
		$comuna = $_POST['comuna'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['correo'];

		Editar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo);

	break;




	case '4':

		Eliminar_Clinica($_POST['id']);
		break;

	default:

		echo 'hubo un error al intentar realizar la operación';

	break;
}
?>