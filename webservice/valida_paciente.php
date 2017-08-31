<?php 
	
	header('Content-Type: application/json');
	require_once "conexion.php";

	$id=$_REQUEST['id'];
	$pas=$_REQUEST['pas'];
	
	$res= $conexion->query("SELECT * FROM paciente WHERE id_paciente ='$id' AND pass='$pas'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);

 ?>