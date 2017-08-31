<?php
	require_once("../conexion/bd.php");
	require_once("../controlador/medico.controlador.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title> Frequency </title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilo.css" >
    <link rel="stylesheet" href="css/animate.css" >
</head>
<body>
    
    <?php include('barra.php'); ?>
   
  <br><br><br>
  <div class="container">
	<h1>Médico</h1>
	<hr />
	<br>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th></th>
			<th>Acciones</th>
		</thead>
		<tbody>
		<?php foreach(Obtener_Medico() AS $Medico){ ?>
			<tr>	
				<td><?php echo $Medico['nombre'];?></td>
				<td><?php echo $Medico['apellido_p'];?></td>
				<td><?php echo $Medico['apellido_m']; ?></td>
				<td><?php echo $Medico['telefono']; ?></td>
				<td><?php echo $Medico['correo']; ?></td>
				<td></td>
				<!--Completar con lo que sale en el bd tabla clinica -->
				<td>
				<button onclick="Editar_Medico('<?php echo $Medico['id_medico']; ?>')" class="btn btn-warning editar"> Editar </button>
				<button onclick="Eliminar_Medico('<?php echo $Medico['id_medico']; ?>')" class="btn btn-danger">  Eliminar </button>
				</td>
			</tr>
		<?php }?>
		</tbody>
		<tfoot>
			<!--<button class="btn btn-primary pull-right">Agregar</button>-->
		</tfoot>
	</table>
  <button id="addMedico" class="btn btn-primary col-md-push-3 right" type="button">Agregar</button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_eliminar">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar Medico</h4>
        </div>
      <div class="modal-body">

       <div class="row">
              <div class="form-group col-xs-12">
                <label class="control-label"> Esta seguro que desea Elimiar</label>      
              </div>
        </div>
      <div class="modal-footer">
        <button id="eliminar_medico" type="button" class="btn btn-danger">Eliminar</button>
        <button id="eliminar_cancelar" type="reset" class="btn btn-defauld">Cancelar</button>
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
        <h4 class="modal-title">Editar Médico</h4>
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

		<div class="row">
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal_add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Medico</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div id="div_rut_medico" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Rut: </label>      
                <input type="text" class="form-control" id="rut_medico" >   
              </div>
              <div id="div_nombre_medico" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Nombres: </label>      
                <input type="text" class="form-control" id="nombre_medico">
            </div>
          </div>

          <div class="row">
            <div id="div_apellido_paterno" class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <label class="control-label"> Apellido Paterno: </label>       
                  <input type="text" class="form-control" id="apellidoP_medico">
              </div>
              <div id="div_apellido_materno" class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <label class="control-label"> Apellido Materno: </label>       
                  <input type="text" class="form-control" id="apellidoM_medico">
              </div>
          </div>
          <div class="row">
              <div id="div_correo_medico" class="form-group col-xs-12 col-sm-8 ">
                  <label class="control-label"> Correo: </label>       
                  <input type="text" class="form-control" id="correo_medico">
            </div>
            
            <div id="div_telefono_medico" class="form-group col-xs-12 col-sm-4">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="telefono_medico">
            </div>  
          </div>

          <div class="row">
            <div id="div_ruta_img_medico" class="form-group col-xs-12 col-sm-4">
                <label class="control-label"> Ruta Imagen: </label>       
                <input type="text" class="form-control" id="ruta_img_medico">
            </div>
              <div id="div_codigo_medico" class="form-group col-xs-12 col-sm-8">
                  <label class="control-label"> Codigo Clinica: </label>       
                  <input type="text" class="form-control" id="codigo_medico">
              </div>
            </div>
              <div class="row">
                <div id="div_contrasena_medico" class="form-group col-xs-12">
                    <label class="control-label"> Contraseña: </label>       
                    <input type="text" class="form-control" id="contrasena_medico">
                </div>
            </div>
         
           </div>
      <div class="modal-footer">
        <button id="agregar_medico" type="button" class="btn btn-primary">Agregar Medico</button>
        <button id="cancelar" type="reset" class="btn btn-danger">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                <!--............hasta aqui............-->
  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="alerta">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                 <h4> Mensaje </h4> 
                </div>
                <div class="modal-body"> 
                  <p id="alerta_texto"></p>
                </div>
      
              </div>
            </div>
          </div>

		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    	<script src="js/bootbox.min.js"></script>	
<script>
	

$(document).ready(function(){

	$('#id_oculto').hide();

	$('.editar').click(function(){
		$('#modal_editar').modal('show');
	});

  $('#addMedico').click(function(){
      $('#modal_add').modal('show');
  });

  $('#cancelar').click(function(){
      $('#modal_add').modal('hide');
  });

  $('#agregar_medico').click(function(){
    function agregar_efecto_error(id){
              $(id).addClass("has-error");
              $(id).addClass('animated shake');
          }

            var estado = true;
            //limpiar_formulario();
            if($("#nombre_medico").val().length == 0){
                agregar_efecto_error("#div_nombre_medico");          
                estado = false;                
            }
            if($("#apellidoP_medico").val().length == 0){
                agregar_efecto_error("#div_apellido_paterno");          
                estado = false;                
            }
            if($("#apellidoM_medico").val().length == 0){
                agregar_efecto_error("#div_apellido_materno");          
                estado = false;               
            }   
            if($("#rut_medico").val() == 0){
                agregar_efecto_error("#div_rut_medico");
                estado = false;
            }
            if($("#correo_medico").val() == 0){
                agregar_efecto_error("#div_correo_medico");
                estado = false;
            }
            if($("#telefono_medico").val() == 0){
                agregar_efecto_error("#div_telefono_medico");
                estado = false;
            }            
            if($("#codigo_medico").val() == 0){
                agregar_efecto_error("#div_codigo_medico");
                estado = false;
            }
            if($("#ruta_img_medico").val() == 0){
                agregar_efecto_error("#div_ruta_img_medico");
                estado = false;
            }
            if($("#contrasena_medico").val() == 0){
                agregar_efecto_error("#div_contrasena_medico");
                estado = false;
            }
            if(estado){

              var datos = new FormData();
              datos.append('rut_medico', $("#rut_medico").val());
              datos.append('contrasena_medico', $("#contrasena_medico").val());
              datos.append('nombre_medico', $("#nombre_medico").val());
              datos.append('apellidoP_medico', $("#apellidoP_medico").val());
              datos.append('apellidoM_medico', $("#apellidoM_medico").val());
              datos.append('telefono_medico', $("#telefono_medico").val());
              datos.append('correo_medico', $("#correo_medico").val());
              datos.append('ruta_img_medico', $("#ruta_img_medico").val());
              datos.append('codigo_medico', $("#codigo_medico").val());
              datos.append('bandera', '1');
         
              $.ajax({
              async: false,
              type: 'POST',
              url: 'script_medico.php',
              data:datos,
              contentType:false,
              processData:false,
              cache:false,
          
              }).done(function(datos) { 

                  $("#alerta_texto").text(datos);
                  $('#modal_add').modal('hide');
                   location.reload();
                  $('#alerta').modal('show');

              });
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


function Eliminar_Medico(id){

	var datos = new FormData();
  $('#modal_eliminar').modal('show');

  $('#eliminar_cancelar').click(function(){
    $('#modal_eliminar').modal('hide');
  });

  $('#eliminar_medico').click(function(){
        datos.append('id', id);
        datos.append('bandera', "4");

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
  });
  
}
</script>
</body>
</html>