<?php 
header('Content-Type: application/json');
	require_once "conexion.php";

	$id=$_REQUEST['id'];
	$pas=$_REQUEST['pas'];
	$nom=$_REQUEST['nom'];
	$app=$_REQUEST['app'];
	$apm=$_REQUEST['apm'];
	$dic=$_REQUEST['dic'];
	$cor=$_REQUEST['cor'];
	$tel=$_REQUEST['tel'];
	$img=$_REQUEST['img'];
	$rol=2;
	$fkp=$_REQUEST['fkp'];
	$tele=(int)$tel;
	

	$res= $conexion->query("INSERT INTO cuidador (id_cuidador, pass, nombre, apellido_p, apellido_m, direccion, correo, telefono, rol, ruta_img, fk_paciente) values('$id','$pas','$nom','$app','$apm','$dic','$cor','$tele','$rol','$img','$fkp')");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>