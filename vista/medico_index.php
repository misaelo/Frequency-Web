<?php
	require_once("../conexion/bd.php");
	require_once("../controlador/medico.controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title> Frequency </title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		
    	<link rel="stylesheet" href="css/animate.css" >
	</head>
		
	<body >
	
	<?php include('medico_barra.php'); ?>
	<br>
	<br class="hidden-xs">
	<br class="hidden-xs">
	<br class="hidden-xs">
	<br>
	<br>
 	<div class="container">
 		<div class="row">
 			<div class="col-xs-12 col-sm-6">
 				<div class="panel panel-success">
				  <div class="panel-heading">
				    <h2 class="panel-title">Reportes</h2>
				  </div>
				  <div class="panel-body">
				    <h4>Ingrese el Rut del paciente mas la cantidad de días a evaluar, para obtener graficas de su comportamiento.</h4>
				    <button id="Reportes" class="btn btn-success col-md-push-3 right" type="button">Entrar</button>
				  </div>
				</div>
 			</div>
 			<div class="col-xs-12 col-sm-6">
 				<div class="panel panel-warning">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pacientes</h3>
				  </div>
				  <div class="panel-body">
				    <h4>Genera una lista de sus pacientes, donde encontrara opciones para agregar, modificar o eliminar.</h4>
				    <a href="medico_paciente.php"><button id="Pacientes" class="btn btn-warning col-md-push-3 right" type="button">Entrar</button></a>
				  </div>
				</div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-xs-12 col-sm-6">
 				<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">Cuidadores</h3>
				  </div>
				  <div class="panel-body">
				    <h4>Genera una lista de los cuidadores, donde encontrara opciones para agregar, modificar o eliminar.</h4>
				    <a href="medico_cuidador.php"><button id="Cuidadores" class="btn btn-primary col-md-push-3 right" type="button">Entrar</button></a>
				  </div>
				</div>
 			</div>
 			<div class="col-xs-12 col-sm-6">
 				<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Mis Datos</h3>
				  </div>
				  <div class="panel-body">
				    <h4>Permite conocer su información registrada en el sistema, con opción de poder modificar cierta información. </h4>
				    <button id="Datos" onclick="Editar_Medico('<?php echo $_SESSION['id_medico']; ?>')" class="btn btn-danger col-md-push-3 right" type="button">Ver</button>
				  </div>
				</div>
 			</div>
 		</div>
 	</div>
		
	<div class="modal fade" tabindex="-1" role="dialog" id="modal_reporte">
		<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        		<h4 class="modal-title">Reporte</h4>
	      		</div>
	      		<div class="modal-body">
		       		<div class="row">
		            	<div class="form-group col-xs-12 col-sm-6">
				            <div id="div_nombre" class="form-group col-xs-12">
				            	<h4>Rut del paciente</h4>
				                <label class="control-label"> Rut : </label>       
				                <input type="text" class="form-control" id="Rut_Paciente">
				            </div>
		            	</div>
		            	<div class="form-group col-xs-12 col-sm-6">
				            <div id="div_cantidad" class="form-group col-xs-12">
				            	<h4>Cantidad de Dias</h4>
				                <label class="control-label"> Dias : </label>       
				                <input type="text" class="form-control" id="cantidad">
				            </div>
		            	</div>
		        	</div>
			      	<div class="modal-footer">
			        	<button id="paciente" type="button" class="btn btn-success">Aceptar</button>
			        	<button id="cancelar" type="reset" class="btn btn-defauld">Cancelar</button>
			      	</div>
	    		</div><!-- /.modal-content -->
	  		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modal_editar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mis Datos</h4>
      </div>
      <div class="modal-body">
      

        <input type="text" id="id_oculto" >

  		 <div class="row">
            <div id="div_nombre" class="form-group col-xs-12">
                <label class="control-label"> Nombre: </label>       
                <input type="text" class="form-control" id="editar_nombremedico">
            </div>
        </div>

  		 <div class="row">
            <div id="div_apellidoP" class="form-group col-xs-12">
                <label class="control-label"> Apellido Paterno: </label>       
                <input type="text" class="form-control" id="editar_apellidoPmedico">
            </div>
        </div>

         <div class="row">
            <div id="div_apellidoM" class="form-group col-xs-12">
                <label class="control-label"> Apellido Materno: </label>       
                <input type="text" class="form-control" id="editar_apellidoMmedico">
            </div>
        </div>

         <div class="row">
            <div id="div_telefono" class="form-group col-xs-12">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="editar_telefonomedico">
            </div>
        </div>

         <div class="row">
            <div id="div_correo" class="form-group col-xs-12">
                <label class="control-label"> Correo: </label>       
                <input type="text" class="form-control" id="editar_correomedico">
            </div>
         </div>

         <div class="row">
            <div id="div_contrasena" class="form-group col-xs-12">
                <label class="control-label"> Contraseña: </label>       
                <input type="text" class="form-control" id="editar_contrasenamedico">
            </div>
         </div>

		<div class="row hidden">
            <div id="div_img" class="form-group col-xs-12 ">
                <label class="control-label"> Imagen: </label>       
                <input type="text" class="form-control" id="editar_img_medico">
            </div>
         </div>

         <div class="row">
            <div id="div_fk_medico" class="form-group col-xs-12">
                <label class="control-label"> Codigo Clinica: </label>       
                <input disabled type="text" class="form-control " id="editar_fk_clinica_medico">
            </div>
         </div>


      </div>
      <div class="modal-footer">
        <button id="guardar_cambios" type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
		<script src="js/estilo.js"></script>
    	<script src="js/bootbox.min.js"></script>
   
   <script>

	$(document).ready(function(){
		function agregar_efecto_error(id){
              $(id).addClass("has-error");
              $(id).addClass('animated shake');
          }

		$('#id_oculto').hide();

		$('#Datos').click(function(){
			$('#modal_editar').modal('show');
		});

		$('#Reportes').click(function(){
		    $('#modal_reporte').modal('show');
		});

		$('#cancelar').click(function(){
		    $('#modal_reporte').modal('hide');
		});

		$('#paciente').click(function(){
			if($('#Rut_Paciente').val() != ""){
				if( $('#cantidad').val() != ""){
					window.location.href = 'paciente_index.php?id='+$('#Rut_Paciente').val()+"&can="+$('#cantidad').val();
				}else{
					agregar_efecto_error("#div_nombre");
				}
			}else{
				agregar_efecto_error("#div_nombre");
			}
		    
		});

		$('#guardar_cambios').click(function(){

	        var datos = new FormData();

	        datos.append('rut_medico', $('#id_oculto').val() );
	        datos.append('contrasena_medico', $('#editar_contrasenamedico').val());
	        datos.append('nombre_medico', $('#editar_nombremedico').val());
	        datos.append('apellidoP_medico', $('#editar_apellidoPmedico').val());
	        datos.append('apellidoM_medico', $('#editar_apellidoMmedico').val());
	        datos.append('correo_medico', $('#editar_correomedico').val());
	        datos.append('telefono_medico', $('#editar_telefonomedico').val());
	        datos.append('ruta_img_medico', $('#editar_img_medico').val());
	        datos.append('codigo_medico', $('#editar_fk_clinica_medico').val());
	        datos.append('bandera', "3");


	        $.ajax({
	            async: false,
	            type: 'POST',
	            url: 'script_medico.php',
	            data:datos,
	            contentType:false,
	            processData:false,
	            cache:false,
	            dataType: 'json',
	            success: function (data){         

	            }
	      
	            });
	        location.reload();
	        $('#modal_editar').modal('hide');
		});
	});

	function Editar_Medico(id){
	
		var datos = new FormData();

        datos.append('id', id);
        datos.append('bandera', "2");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_medico.php',
            data:datos,
            contentType:false,
            processData:false,
            cache:false,
            dataType: 'json',
            success: function (data){

            $('#id_oculto').val(data[0]);    
      		  $('#editar_contrasenamedico').val(data[1]); 
      		  $('#editar_nombremedico').val(data[2]); 
   			    $('#editar_apellidoPmedico').val(data[3]); 
   			    $('#editar_apellidoMmedico').val(data[4]);
      		  $('#editar_telefonomedico').val(data[5]); 
      		  $('#editar_correomedico').val(data[6]); 
     		    $('#editar_img_medico').val(data[7]); 
      		  $('#editar_fk_clinica_medico').val(data[8]); 

            }
      
        });
	}
</script>
</body>
</html>

<!-- 
<div id="div_region_zona" class="form-group">
                  <label class="control-label"> Región: </label>       
                  <select id="region_zona" class="form-control">
                    <option value=0 selected>Seleccione una opción</option>
                    <?php foreach (Listar_Regiones() as $Regiones){ ?>
                      <option value=<?php echo $Regiones['idRegion']?>> <?php echo $Regiones['nombreR']?> </option>
                    <?php } ?> 
                  </select>
                  </div>
-->