<?php 
class Sueno_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Listar_Sueno(){

			$consulta=$this->db->query("SELECT * FROM hora_sueno ");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Sueno($id,$limite){

			$consulta=$this->db->query("SELECT * FROM hora_sueno WHERE fk_paciente ='$id' ORDER BY fecha ASC LIMIT ".$limite);
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

	}
?>