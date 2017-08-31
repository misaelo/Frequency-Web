<?php 
require_once("../modelo/cuidador.modelo.php");

	function Agregar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente){

		$modelo_cuidador = new Cuidador_Modelo;
		$datos = $modelo_cuidador->
			Insertar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente);
	}

	function Obtener_Cuidador(){

		$modelo_cuidador = new  Cuidador_Modelo;
		$datos = $modelo_cuidador->Listar_Cuidadores();
		return $datos;
	}

	function Buscar_Cuidador($id){

		$modelo_cuidador = new  Cuidador_Modelo;
		$datos = $modelo_cuidador->Buscar_Cuidador($id);
		return $datos;
	}

	function Editar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente){

		$modelo_cuidador = new Cuidador_Modelo;
		$datos = $modelo_cuidador->Editar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente);

	}


	function Eliminar_Cuidador($id){

		$modelo_cuidador = new Cuidador_Modelo;
		$datos = $modelo_cuidador->Eliminar_Cuidador($id);
	}



 ?>