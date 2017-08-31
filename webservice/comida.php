<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$fec=$_REQUEST['fec'];
	$nva=$_REQUEST['nva'];
	$ncs=$_REQUEST['ncs'];
	$sin=$_REQUEST['sin'];
	$obv=$_REQUEST['obv'];
	$fkp=$_REQUEST['fkp'];
	$fkc=$_REQUEST['fkc'];	

	$fecha = strtotime($fec);
	$f = date("Y-m-d",$fecha);

	$nivel = (int)$nva;
	$nco = (int)$ncs;

	$res= $conexion->query("INSERT INTO comida (fecha, nivel_apetito, numero_comidas, sintomas, observacion, fk_paciente, fk_cuidador) 
		values('$f','$nivel','$nco','$sin','$obv','$fkp','$fkc')");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>