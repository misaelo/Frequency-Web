<?php 
	header('Content-Type: application/json');
	require_once "conexion.php";

	$idp=$_REQUEST['idp'];
	$idm=$_REQUEST['idm'];

	$res= $conexion->query("SELECT * FROM control WHERE fk_paciente ='$idp' AND fk_medico='$idm'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>