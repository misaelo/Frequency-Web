<?php 
class Paciente_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Insertar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico){

			$consult = $this->db->prepare("INSERT INTO paciente (id_paciente, pass, nombre, apellido_p, apellido_m, fecha_nacimiento, ciudad, direccion, telefono, ruta_img, fk_medico) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$consult->bind_param('ssssssssiss', $id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico);
			$consult->execute();
		}
		
		
		public function Listar_Pacientes(){

			$consulta=$this->db->query("SELECT * FROM paciente");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Paciente($id){

			$consulta=$this->db->query("SELECT * FROM paciente WHERE id_paciente ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}


		public function Editar_Paciente($id,$pass,$nombre,$apellidoP,$apellidoM,$fecha_nacimiento,$ciudad,$direccion,$telefono,$ruta_img,$fk_medico){

			$consult = $this->db->prepare("UPDATE paciente SET pass = ?, nombre = ?, apellido_p = ?, apellido_m = ?, fecha_nacimiento = ?, ciudad = ?, direccion = ?, telefono = ?, ruta_img = ?, fk_medico = ? WHERE id_paciente = '$id'");
			$consult->bind_param('sssssssiss',$pass,$nombre,$apellidoP,$apellidoM, $fecha_nacimiento, $ciudad, $direccion, $telefono,$ruta_img,$fk_medico);
			$consult->execute();

		}


		public function Eliminar_Paciente($id){

			$consult = $this->db->prepare("DELETE FROM paciente WHERE id_paciente = ?");
			$consult->bind_param('s', $id);
			$consult->execute();
			
		}
		
		

	

	}
 ?>