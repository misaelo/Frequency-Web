<?php 
class Clinica_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

public function Iniciar_Sesion(){

		$consulta=$this->db->query("SELECT * FROM clinica WHERE id_clinica ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
		    }
				
			return $this->datos;

}



}
?>