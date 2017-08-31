<?php 
require_once("conexion/bd.php");
require_once("controlador/sesion.controlador.php");

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

session_start();

if(Buscar_Clinica($usuario)){

	foreach (Buscar_Clinica($usuario) AS $Clinica) {

		if($Clinica['pass'] === $pass){

			echo json_encode("vista/clinica_index.php");

		     $_SESSION['NombreUsuario'] = $Clinica['nombre'];
			$_SESSION['id'] =$Clinica['id_clinica']; 
			$_SESSION['ApellidoPUsuario'] =$Clinica['comuna'];
		}else{
			echo json_encode(0);
		}
	}
}elseif(Buscar_Medico($usuario)){

	foreach (Buscar_Medico($usuario) AS $Medico) {
			
		if($Medico['pass'] === $pass){
			echo json_encode("vista/medico_index.php");

			$_SESSION['id_medico'] = $Medico['id_medico'];
			$_SESSION['NombreUsuario'] = $Medico['nombre'];
			$_SESSION['ApellidoPUsuario'] =$Medico['apellido_p'];

		}else{
			echo json_encode(0);
		}
		
	}
}elseif(Buscar_Admin($usuario)){

	foreach (Buscar_Admin($usuario) AS $Admin) {
			
		if($Admin['pass'] === $pass){
			echo json_encode("vista/index.php");

			$_SESSION['NombreUsuario'] = $Admin['nombre'];
			$_SESSION['ApellidoPUsuario'] =$Admin['apellido'];

		}else{
			echo json_encode(0);
		}
		
	}
}elseif(!Buscar_Admin($usuario) && !Buscar_Medico($usuario) && !Buscar_Clinica($usuario)){
	echo json_encode(0);
}


?>