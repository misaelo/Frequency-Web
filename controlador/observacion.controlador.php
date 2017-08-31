<?php 

require_once("../modelo/observacion.modelo.php");


	function Buscar_observacion($id,$limite){

		$modelo_observa = new  Observacion_Modelo;
		$datos = $modelo_observa->Buscar_observa($id,$limite);
		return $datos;
	}
?>