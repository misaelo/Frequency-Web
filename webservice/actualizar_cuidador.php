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
	$idn=$_REQUEST['idn'];
	$tele=(int)$tel;
	

	$res= $conexion->query("UPDATE cuidador SET id_cuidador= '$idn',pass='$pas', nombre='$nom', apellido_p = '$app', apellido_m = '$apm', direccion ='$dic',correo = '$cor', telefono = '$tele', rol = '$rol', ruta_img = '$img', fk_paciente = '$fkp' WHERE id_cuidador= '$id'");

	$datos = array();
	
	foreach ($res as $row) {
		$datos[]=$row;
	}

	echo json_encode($datos);
 ?>