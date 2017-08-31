<?php 
class Cuidador_Modelo{
		private $db;
		private $datos;

		public function __construct(){
		
		$this->db=Conectar::Conexion();
		
		$this->datos=array();
	}

		public function Insertar_Cuidador($id,$pass,$nombre,$apellido_p,$apellido_m,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente){

			$consult = $this->db->prepare("INSERT INTO cuidador (id_cuidador, pass, nombre, apellido_p, apellido_m, direccion, correo, telefono, rol, ruta_img, fk_paciente) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$consult->bind_param('sssssssiiss', $id, $pass, $nombre, $apellido_p, $apellido_m, $direccion, $correo, $telefono, $rol, $ruta_img, $fk_paciente);
			$consult->execute();
		}

		public function Listar_Cuidadores(){

			$consulta=$this->db->query("SELECT * FROM cuidador");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}

		public function Buscar_Cuidador($id){

			$consulta=$this->db->query("SELECT * FROM cuidador WHERE id_cuidador ='$id'");
			
			while($filas=$consulta->fetch_assoc()){
				
						$this->datos[]=$filas;
				
				}
				
			return $this->datos;
		}


		public function Editar_Cuidador($id,$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente){

			$consult = $this->db->prepare("UPDATE cuidador SET pass = ?, nombre = ?, apellido_p = ?, apellido_m = ?, direccion = ?, correo = ?, telefono = ?, rol = ?, ruta_img = ?, fk_paciente = ? WHERE id_cuidador = '$id'");
			$consult->bind_param('ssssssiiss',$pass,$nombre,$apellidoP,$apellidoM,$direccion,$correo,$telefono,$rol,$ruta_img,$fk_paciente);
			$consult->execute();

		}

		public function Eliminar_Cuidador($id){

			$consult = $this->db->prepare("DELETE FROM cuidador WHERE id_cuidador = ?");
			$consult->bind_param('s', $id);
			$consult->execute();
			
		}
		
		

	}
 ?>