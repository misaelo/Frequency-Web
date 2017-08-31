<?php
require_once("../conexion/bd.php");
require_once("../controlador/cuidador.controlador.php");


$bandera = $_POST['bandera'];

switch ($bandera) {
	case '1':

		$id = $_POST['rut_cuidador'];
		$pass = $_POST['contrasena_cuidador'];
		$nombre = $_POST['nombre_cuidador'];
		$apellidoP = $_POST['apellidoP_cuidador'];
		$apellidoM = $_POST['apellidoM_cuidador'];
		$direccion = $_POST['direccion_cuidador'];
		$correo = $_POST['correo_cuidador'];
		$telefono = $_POST['telefono_cuidador'];
		$rol = $_POST['rol_cuidador'];
		$ruta_img = $_POST['ruta_img_cuidador'];
		$fk_paciente = $_POST['fk_Paciente_cuidador'];

		Agregar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente);
		
		echo 'la información se guardo correctamente';

	break;

	case '2':

		$id;
		$pass;
		$nombre;
		$apellidoP;
		$apellidoM;
		$direccion;
		$correo;
		$telefono;
		$rol;
		$ruta_img;
		$fk_paciente;

		foreach(Buscar_Cuidador($_POST['id']) as $Cuidador){

			$id = $Cuidador['id_cuidador'];
			$pass = $Cuidador['pass'];
			$nombre = $Cuidador['nombre'];
			$apellidoP = $Cuidador['apellido_p'];
			$apellidoM = $Cuidador['apellido_m'];
			$direccion = $Cuidador['direccion'];
			$correo = $Cuidador['correo'];
			$telefono = $Cuidador['telefono'];
			$rol = $Cuidador['rol'];
			$ruta_img = $Cuidador['ruta_img'];
			$fk_paciente = $Cuidador['fk_paciente'];

		}

		$arreglo = array();
		$arreglo[0] = $id;
		$arreglo[1] = $pass;
		$arreglo[2] = $nombre;
		$arreglo[3] = $apellidoP;
		$arreglo[4] = $apellidoM;
		$arreglo[5] = $direccion;
		$arreglo[6] = $correo;
		$arreglo[7] = $telefono;
		$arreglo[8] = $rol;
		$arreglo[9] = $ruta_img;
		$arreglo[10] = $fk_paciente;

		echo json_encode($arreglo);
		exit();

	break;


	case '3':

		$id = $_POST['rut_cuidador'];
		$pass = $_POST['contrasena_cuidador'];
		$nombre = $_POST['nombre_cuidador'];
		$apellidoP = $_POST['apellidoP_cuidador'];
		$apellidoM = $_POST['apellidoM_cuidador'];
		$direccion = $_POST['direccion_cuidador'];
		$correo = $_POST['correo_cuidador'];
		$telefono = $_POST['telefono_cuidador'];
		$rol = $_POST['rol_cuidador'];
		$ruta_img = $_POST['ruta_img_cuidador'];
		$fk_paciente = $_POST['fk_paciente_cuidador'];


			Editar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente);



	break;

	case '4':

		Eliminar_Cuidador($_POST['id']);
		break;




	default:

		echo 'hubo un error al intentar realizar la operación';

	break;
}
?>