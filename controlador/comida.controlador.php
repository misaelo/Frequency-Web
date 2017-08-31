<?php 

require_once("../modelo/comida.modelo.php");


	function Buscar_Comida($id,$limite){

		$modelo_comida = new  Comida_Modelo;
		$datos = $modelo_comida->Buscar_Comida($id,$limite);
		return $datos;
	}

?>