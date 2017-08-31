<?php 
require_once("../modelo/paciente.modelo.php");

	function Agregar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico){

		$modelo_paciente = new Paciente_Modelo;
		$datos = $modelo_paciente->
			Insertar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico);
	}

	function Obtener_Paciente(){

		$modelo_paciente = new  Paciente_Modelo;
		$datos = $modelo_paciente->Listar_Pacientes();
		return $datos;
	}

	function Buscar_Paciente($id){

		$modelo_paciente = new  Paciente_Modelo;
		$datos = $modelo_paciente->Buscar_Paciente($id);
		return $datos;
	}

	function Editar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico){

		$modelo_paciente = new Paciente_Modelo;
		$datos = $modelo_paciente->Editar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico);

	}


	function Eliminar_Paciente($id){

		$modelo_paciente = new Paciente_Modelo;
		$datos = $modelo_paciente->Eliminar_Paciente($id);
	}


 ?>