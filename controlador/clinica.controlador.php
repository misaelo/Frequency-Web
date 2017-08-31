<?php 

require_once("../modelo/clinica.modelo.php");

	function Agregar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo){

		$modelo_clinica = new Clinica_Modelo;
		$datos = $modelo_clinica->Insertar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo);
	}

	function Obtener_Clinicas(){

		$modelo_clinica = new  Clinica_Modelo;
		$datos = $modelo_clinica->Listar_Clinicas();
		return $datos;
	}

	function Buscar_Clinica($id){

		$modelo_clinica = new  Clinica_Modelo;
		$datos = $modelo_clinica->Buscar_Clinica($id);
		return $datos;
	}

	function Editar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo){

		$modelo_clinica = new Clinica_Modelo;
		$datos = $modelo_clinica->Editar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo);

	}


	function Eliminar_Clinica($id){

		$modelo_clinica = new Clinica_Modelo;
		$datos = $modelo_clinica->Eliminar_Clinica($id);
	}

?>

