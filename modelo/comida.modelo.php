<?php 
class Comida_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Listar_Comidas(){

			$consulta=$this->db->query("SELECT * FROM comida ");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Comida($id, $limite){

			$consulta=$this->db->query("SELECT * FROM comida WHERE fk_paciente ='$id' ORDER BY fecha ASC LIMIT ".$limite);
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Comida_Nivel($id){

			$consulta=$this->db->query("SELECT nivel_apetito FROM comida WHERE fk_paciente ='$id'");
			while($filas=$consulta->fetch_assoc()){
						$this->datos[]=$filas;
				}
			return $this->datos;
		}

	}
?>