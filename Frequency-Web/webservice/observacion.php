<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	
	$fec=$_REQUEST['fec'];
	$obv=$_REQUEST['obv'];
	$fkp=$_REQUEST['fkp'];
	$fkc=$_REQUEST['fkc'];	

	$fecha = strtotime($fec);
	$f = date("Y-m-d",$fecha);

	$res= $conexion->query("INSERT INTO observacion (fecha, observacion, fk_paciente, fk_cuidador) 
							values('$f','$obv','$fkp','$fkc')");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>