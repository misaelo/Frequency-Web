<?php 

require_once("modelo/clinica.modelo.php");
require_once("modelo/medico.modelo.php");
require_once("modelo/admin.modelo.php");

function Buscar_Clinica($id){

		$modelo_clinica = new  Clinica_Modelo;
		$datos = $modelo_clinica->Buscar_Clinica($id);
		return $datos;
	}
function Buscar_Medico($id){

		$modelo_medico = new  Medico_Modelo;
		$datos = $modelo_medico->Buscar_Medico($id);
		return $datos;
	}
function Buscar_Admin($id){

		$modelo_admin = new  Admin_Modelo;
		$datos = $modelo_admin->Buscar_Admin($id);
		return $datos;
	}
?>