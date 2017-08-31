<?php 
class Admin_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Buscar_Admin($id){
			$consulta=$this->db->query("SELECT * FROM admin WHERE id_admin ='$id'");
			while($filas=$consulta->fetch_assoc()){
						$this->datos[]=$filas;
				}
			return $this->datos;
		}
	}
?>