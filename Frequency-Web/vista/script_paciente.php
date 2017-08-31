<?php
require_once("../conexion/bd.php");
require_once("../controlador/paciente.controlador.php");


$bandera = $_POST['bandera'];

switch ($bandera) {
	case '1':

		$id = $_POST['rut_paciente'];
		$pass = $_POST['contrasena_paciente'];
		$nombre = $_POST['nombre_paciente'];
		$apellidoP = $_POST['apellidoP_paciente'];
		$apellidoM = $_POST['apellidoM_paciente'];
		$fecha_nacimiento = $_POST['fechanacimiento_paciente'];
		$ciudad = $_POST['ciudad_paciente'];
		$direccion = $_POST['direccion_paciente'];
		$telefono = $_POST['telefono_paciente'];
		$ruta_img = $_POST['ruta_img_paciente'];
		$fk_medico = $_POST['rutmedico_paciente'];
		

		Agregar_paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico);
		
		echo 'la información se guardo correctamente';

	break;

	case '2':

		$id;
		$pass;
		$nombre;
		$apellidoP;
		$apellidoM;
		$fecha_nacimiento;
		$ciudad;
		$direccion;
		$telefono;
		$ruta_img;
		$fk_medico;

		foreach(Buscar_Paciente($_POST['id']) as $Paciente){

			$id = $Paciente['id_paciente'];
			$pass = $Paciente['pass'];
			$nombre = $Paciente['nombre'];
			$apellidoP =$Paciente['apellido_p'];
			$apellidoM =$Paciente['apellido_m'];
			$fecha_nacimiento = $Paciente['fecha_nacimiento'];
			$ciudad = $Paciente['ciudad'];
			$direccion = $Paciente['direccion'];
			$telefono = $Paciente['telefono'];
			$ruta_img = $Paciente['ruta_img'];
			$fk_medico = $Paciente['fk_medico'];



		}

		$arreglo = array();
		$arreglo[0] = $id;
		$arreglo[1] = $pass;
		$arreglo[2] = $nombre;
		$arreglo[3] = $apellidoP;
		$arreglo[4] = $apellidoM;
		$arreglo[5] = $fecha_nacimiento;
		$arreglo[6] = $ciudad;
		$arreglo[7] = $direccion;
		$arreglo[8] = $telefono;
		$arreglo[9] = $ruta_img;
		$arreglo[10] = $fk_medico;

		echo json_encode($arreglo);
		exit();

	break;


	case '3':

		$id = $_POST['rut_paciente'];
		$pass = $_POST['contrasena_paciente'];
		$nombre = $_POST['nombre_paciente'];
		$apellidoP = $_POST['apellidoP_paciente'];
		$apellidoM = $_POST['apellidoM_paciente'];
		$fecha_nacimiento = $_POST['fechanacimiento_paciente'];
		$ciudad = $_POST['ciudad_paciente'];
		$direccion = $_POST['direccion_paciente'];
		$telefono = $_POST['telefono_paciente'];
		$ruta_img = $_POST['ruta_img_paciente'];
		$fk_medico = $_POST['rutmedico_paciente'];
		

			Editar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico);

	break;

	case '4':

		Eliminar_Paciente($_POST['id']);
		break;





	default:

		echo 'hubo un error al intentar realizar la operación';

	break;
}
?>