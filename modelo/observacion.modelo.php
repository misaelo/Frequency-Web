<?php 
class Observacion_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Listar_Observaciones(){

			$consulta=$this->db->query("SELECT * FROM observacion ");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}
		public function Buscar_observa($id,$limite){

			$consulta=$this->db->query("SELECT * FROM observacion WHERE fk_paciente ='$id' ORDER BY fecha ASC LIMIT ".$limite);
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

	}
?>