<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$fec=$_REQUEST['fec'];
	$hri=$_REQUEST['hri'];
	$hrf=$_REQUEST['hrf'];
	$iti=$_REQUEST['iti'];
	$itf=$_REQUEST['itf'];
	$obv=$_REQUEST['obv'];
	$fkp=$_REQUEST['fkp'];
	$fkc=$_REQUEST['fkc'];	

	$fecha = strtotime($fec);
	$f = date("y-m-d",$fecha);

	$res= $conexion->query("INSERT INTO hora_sueno (fecha, hora_inicio, hora_fin, interrupcion_inicio, interrupcion_fin, observacion, fk_paciente, fk_cuidador) values('$f','$hri','$hrf','$iti','$itf','$obv','$fkp','$fkc')");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>