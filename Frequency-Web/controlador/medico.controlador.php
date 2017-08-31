<?php 
require_once("../modelo/medico.modelo.php");

	function Agregar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica){

		$modelo_medico = new Medico_Modelo;
		$datos = $modelo_medico->
			Insertar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);
	}

	function Obtener_Medico(){

		$modelo_medico = new  Medico_Modelo;
		$datos = $modelo_medico->Listar_Medicos();
		return $datos;
	}

	function Obtener_Medico_Clinica($id){

		$modelo_medico = new  Medico_Modelo;
		$datos = $modelo_medico->Listar_Medicos_Clinicas($id);
		return $datos;
	}

	function Buscar_Medico($id){

		$modelo_medico = new  Medico_Modelo;
		$datos = $modelo_medico->Buscar_Medico($id);
		return $datos;
	}

	function Editar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica){

		$modelo_medico = new Medico_Modelo;
		$datos = $modelo_medico->Editar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);

	}



	function Eliminar_Medico($id){

		$modelo_medico = new Medico_Modelo;
		$datos = $modelo_medico->Eliminar_Medico($id);
	}




 ?>