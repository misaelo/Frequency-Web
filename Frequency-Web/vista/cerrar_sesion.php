<?php 
session_start();

if (isset($_SESSION['NombreUsuario']))
{	
	unset($_SESSION["NombreUsuario"]);
	unset($_SESSION["ApellidoPUsuario"]);
	

	echo '<script language = javascript>
	alert("Has finalizado tu sesion correctamente")
	self.location = "../inicio_sesion.php"
	</script>';}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado ninguna sesion, por favor registrese")
	self.location = "../inicio_sesion.php"
	</script>';}
?>

