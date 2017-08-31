
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Frequency - Login </title>
		<link rel="stylesheet" href="vista/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	</head>
	<body >
		<nav class="navbar navbar-inverse">
  
		</nav>
		<div class="container" style="padding-top:30px;">

		<div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">INICIAR SESIÓN</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input id="usuario" class="form-control" placeholder="Usuario" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input id="pass" class="form-control" placeholder="contraseña" name="contrasena" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" id="iniciar_sesion" type="button" value="Entrar">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
			
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vista/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript">
			
			$(document).ready(function(){

				$("#iniciar_sesion").click(function(){

					var datos = new FormData();

        			datos.append('usuario', $('#usuario').val());
        			datos.append('pass', $('#pass').val());

			        $.ajax({
			            async: false,
			            type: 'POST',
			            url: 'script_inicio_sesion.php',
			            data:datos,
			            contentType:false,
			            processData:false,
			            cache:false,
			            dataType: 'json',
			            success: function (data){

			            if(data == 0 ){

			            	alert("Usuario y/o contraseña invalada.");

			            }else{

			            window.location=data;
			             
			            }

			            }
			      
			        });



				});
			});

		</script>
	</body>
</html>