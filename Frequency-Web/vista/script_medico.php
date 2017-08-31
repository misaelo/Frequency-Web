<?php
require_once("../conexion/bd.php");
require_once("../controlador/medico.controlador.php");


$bandera = $_POST['bandera'];

switch ($bandera) {
	case '1':

		$id = $_POST['rut_medico'];
		$pass = $_POST['contrasena_medico'];
		$nombre = $_POST['nombre_medico'];
		$apellidoP = $_POST['apellidoP_medico'];
		$apellidoM = $_POST['apellidoM_medico'];
		$telefono = $_POST['telefono_medico'];
		$correo = $_POST['correo_medico'];
		$ruta_img = $_POST['ruta_img_medico'];
		$fk_clinica = $_POST['codigo_medico'];
		

		Agregar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);
		
		echo 'la información se guardo correctamente';

	break;

	case '2':

		$id;
		$pass;
		$nombre;
		$apellidoP;
		$apellidoM;
		$telefono;
		$correo;
		$ruta_img;
		$fk_clinica;

		foreach(Buscar_Medico($_POST['id']) as $Medico){


			$id = $Medico['id_medico'];
			$pass = $Medico['pass'];
			$nombre = $Medico['nombre'];
			$apellidoP = $Medico['apellido_p'];
			$apellidoM = $Medico['apellido_m'];
			$telefono = $Medico['telefono'];
			$correo = $Medico['correo'];
			$ruta_img = $Medico['ruta_img'];
			$fk_clinica = $Medico['fk_clinica'];

		}

		$arreglo = array();
		$arreglo[0] = $id;
		$arreglo[1] = $pass;
		$arreglo[2] = $nombre;
		$arreglo[3] = $apellidoP;
		$arreglo[4] = $apellidoM;
		$arreglo[5] = $telefono;
		$arreglo[6] = $correo;
		$arreglo[7] = $ruta_img;
		$arreglo[8] = $fk_clinica;


		echo json_encode($arreglo);
		exit();

	break;


	case '3':

		$id = $_POST['rut_medico'];
		$pass = $_POST['contrasena_medico'];
		$nombre = $_POST['nombre_medico'];
		$apellidoP = $_POST['apellidoP_medico'];
		$apellidoM = $_POST['apellidoM_medico'];
		$telefono = $_POST['telefono_medico'];
		$correo = $_POST['correo_medico'];
		$ruta_img = $_POST['ruta_img_medico'];
		$fk_clinica = $_POST['codigo_medico'];
		

			Editar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);

	break;

	case '4':

		Eliminar_Medico($_POST['id']);
		break;


	default:

		echo 'hubo un error al intentar realizar la operación';

	break;
}
?>