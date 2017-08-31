<?php
	class Conectar{
	
	public static function Conexion(){
		
		$conexion = new mysqli("localhost", "root", "", "frequency");
		//$conexion = new mysqli("mysql.hostinger.es", "u319701112_misa", "GaLS8UCBjIh", "u319701112_frequ");
		
		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
		
		}
	}
?>