<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	//$id=$_REQUEST['id'];
	//$lat=$_REQUEST['lat'];
	//$lon=$_REQUEST['lon'];
	$fkp=$_REQUEST['fkp'];
	

	$res= $conexion->query("SELECT * FROM ubicacion WHERE fk_paciente = '$fkp'");

	//$res= $conexion->query("INSERT INTO ubicacion (latitud, longitud, fk_paciente) values('$lat','$lon','$fkp')");

	//$res= $conexion->query("UPDATE ubicacion SET latitud= '$lat', longitud='$lon' WHERE fk_paciente = '$fkp'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>