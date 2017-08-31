
<?php  
session_set_cookie_params('0');
session_start();
ob_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "../inicio_sesion.php"
</script>';

}
?>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Frequency</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="clinica.php">Clinicas</a></li>
            <li><a href="medico.php">Medicos</a></li>
            <li><a href="paciente.php">Pacientes</a></li>
            <li><a href="cuidador.php">Cuidadores</a></li>
            <li><a href="#">Preguntas</a></li>
            <li><a href="#">Sitios</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido: <?php echo $_SESSION['NombreUsuario'] ." " .$_SESSION['ApellidoPUsuario']; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="cerrar_sesion.php">Salir</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>