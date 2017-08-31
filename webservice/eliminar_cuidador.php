<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$id=$_REQUEST['id'];

	$res= $conexion->query("DELETE FROM cuidador WHERE id_cuidador ='$id'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>