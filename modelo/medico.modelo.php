<?php 
class Medico_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Insertar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica){

			$consult = $this->db->prepare("INSERT INTO medico (id_medico, pass, nombre, apellido_p, apellido_m, telefono, correo, ruta_img, fk_clinica) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$consult->bind_param('sssssisss', $id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);
			$consult->execute();
		}
		


		public function Listar_Medicos(){

			$consulta=$this->db->query("SELECT * FROM medico");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Listar_Medicos_Clinicas($id){

			$consulta=$this->db->query("SELECT * FROM medico WHERE fk_clinica ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Medico($id){

			$consulta=$this->db->query("SELECT * FROM medico WHERE id_medico ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}


		public function Editar_Medico($id,$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica){

			$consult = $this->db->prepare("UPDATE medico SET pass = ?, nombre = ?, apellido_p = ?, apellido_m = ?, telefono = ?, correo = ?, ruta_img = ?, fk_clinica = ? WHERE id_medico = '$id'");
			$consult->bind_param('ssssisss',$pass,$nombre,$apellidoP,$apellidoM,$telefono,$correo,$ruta_img,$fk_clinica);
			$consult->execute();

		}



		public function Eliminar_Medico($id){

			$consult = $this->db->prepare("DELETE FROM medico WHERE id_medico = ?");
			$consult->bind_param('s', $id);
			$consult->execute();
			
		}
		

	}
 ?>