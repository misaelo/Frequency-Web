<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$id=$_REQUEST['id'];

	$res= $conexion->query("SELECT * FROM cuidador WHERE fk_paciente ='$id' ORDER BY nombre ASC");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>