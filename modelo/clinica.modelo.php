<?php 
class Clinica_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Insertar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo){

			$consult = $this->db->prepare("INSERT INTO clinica (id_clinica, pass, nombre,region,comuna,direccion,telefono,correo) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
			$consult->bind_param('ssssssis', $id, $pass, $nombre,$region,$comuna,$direccion,$telefono,$correo);
			$consult->execute();
		}

		public function Listar_Clinicas(){

			$consulta=$this->db->query("SELECT * FROM clinica");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Clinica($id){

			$consulta=$this->db->query("SELECT * FROM clinica WHERE id_clinica ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}



		public function Editar_Clinica($id,$pass,$nombre,$region,$comuna,$direccion,$telefono,$correo){

			$consult = $this->db->prepare("UPDATE  clinica SET  pass = ?, nombre = ?, region = ?, comuna = ?, direccion = ?, telefono = ?, correo = ? WHERE id_clinica = '$id'");
			$consult->bind_param('sssssis',$pass, $nombre,$region,$comuna,$direccion,$telefono,$correo);
			$consult->execute();

		}

		public function Eliminar_Clinica($id){

			$consult = $this->db->prepare("DELETE FROM clinica WHERE id_clinica = ?");
			$consult->bind_param('s', $id);
			$consult->execute();
			
		}
		
		

	}
?>