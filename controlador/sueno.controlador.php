<?php 

require_once("../modelo/sueno.modelo.php");


	function Buscar_sueno($id,$limite){

		$modelo_sueno = new  Sueno_Modelo;
		$datos = $modelo_sueno->Buscar_Sueno($id,$limite);
		return $datos;
	}
?>