<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$id=$_REQUEST['id'];

	$pas=$_REQUEST['pas'];

	$res= $conexion->query("SELECT cuidador.id_cuidador, cuidador.pass FROM cuidador WHERE id_cuidador ='$id' AND pass='$pas'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	if ($datos != []) {
		$result= $conexion->query("SELECT clinica.id_clinica, paciente.id_paciente, medico.id_medico FROM cuidador INNER JOIN paciente ON cuidador.fk_paciente = paciente.id_paciente INNER JOIN medico ON paciente.fk_medico = medico.id_medico INNER JOIN clinica ON medico.fk_clinica = clinica.id_clinica WHERE id_cuidador ='$id'");
			
			foreach ($result as $row) {
				$dato[]=$row;
			}
		echo json_encode($dato);
	}else{
		echo json_encode($datos);
	}

	
 ?>