<?php
	require_once("../conexion/bd.php");
	require_once("../controlador/paciente.controlador.php");

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
<?php include('medico_barra.php'); ?>
  <br><br><br>
<div class="container">
	<h1>Pacientes</h1>
	<hr />
	<br>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Dirección</th>
			<th>Ciudad</th>
			<th>Telefono</th>
			<th></th>
			<th>Acciones</th>
		</thead>
		<tbody>
		<?php foreach(Obtener_Paciente() AS $Paciente){ ?>
			<tr>	
				<td><?php echo $Paciente['nombre'];?></td>
				<td><?php echo $Paciente['apellido_p'];?></td>
				<td><?php echo $Paciente['apellido_m']; ?></td>
				<td><?php echo $Paciente['direccion']; ?></td>
				<td><?php echo $Paciente['ciudad']; ?></td>
				<td><?php echo $Paciente['telefono'];  ?></td>
				<td></td>
				<!--Completar con lo que sale en el bd tabla clinica -->
				<td>
				<button onclick="Editar_Paciente('<?php echo $Paciente['id_paciente']; ?>')" class="btn btn-warning editar"> Editar </button>
				<button onclick="Eliminar_Paciente('<?php echo $Paciente['id_paciente']; ?>')" class="btn btn-danger">  Eliminar </button>
				</td>
			</tr>
		<?php }?>
		</tbody>
		<tfoot>
			<!--<button class="btn btn-primary pull-right">Agregar</button>-->
		</tfoot>
	</table>
  <button id="addPaciente" class="btn btn-primary col-md-push-3 right" type="button">Agregar</button>
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
        <button id="eliminar_paciente" type="button" class="btn btn-danger">Eliminar</button>
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
        <h4 class="modal-title">Editar Paciente</h4>
      </div>
      <div class="modal-body">
      

        <input type="text" id="id_oculto" >

  		 <div class="row">
            <div id="div_nombre" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Nombre: </label>       
                <input type="text" class="form-control" id="editar_nombrepaciente">
            </div>
        </div>

  		 <div class="row">
            <div id="div_apellidoP" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Apellido Paterno: </label>       
                <input type="text" class="form-control" id="editar_apellidoPpaciente">
            </div>
        </div>

         <div class="row">
            <div id="div_apellidoM" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Apellido Materno: </label>       
                <input type="text" class="form-control" id="editar_apellidoMpaciente">
            </div>
        </div>

         <div class="row">
            <div id="div_fechanacimiento" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Fecha de Nacimiento: </label>       
                <input type="date" class="form-control" id="editar_fechapaciente">
            </div>
        </div>

         <div class="row">
            <div id="div_ciudad" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Ciudad: </label>       
                <input type="text" class="form-control" id="editar_ciudadpaciente">
            </div>
        </div>

         <div class="row">
            <div id="div_telefono" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="editar_telefonopaciente">
            </div>
        </div>

         <div class="row">
            <div id="div_contrasena" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Contraseña: </label>       
                <input type="text" class="form-control" id="editar_contrasenapaciente">
            </div>
         </div>

		<div class="row">
            <div id="div_direccion" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Dirección: </label>       
                <input type="text" class="form-control" id="editar_direccionpaciente">
            </div>
         </div>


		<div class="row">
            <div id="div_img" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Imagen: </label>       
                <input type="text" class="form-control" id="editar_img_paciente">
            </div>
         </div>

         <div class="row">
            <div id="div_fk_medico" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Rut Medico: </label>       
                <input type="text" class="form-control" id="editar_fk_paciente_medico">
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button id="guardar_cambios" type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
                      <!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal_add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Paciente</h4>
      </div>
      <div class="modal-body">
        <div class="row">
              <div id="div_rut_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Rut: </label>      
                <input type="text" class="form-control" id="rut_paciente" >   
              </div>
              <div id="div_nombre_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Nombres: </label>      
                <input type="text" class="form-control" id="nombre_paciente">
            </div>
          </div>

          <div class="row">
            <div id="div_apellido_paterno" class="form-group col-xs-12 col-sm-6 ">
                  <label class="control-label"> Apellido Paterno: </label>       
                  <input type="text" class="form-control" id="apellidoP_paciente">
              </div>
              <div id="div_apellido_materno" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Apellido Materno: </label>       
                  <input type="text" class="form-control" id="apellidoM_paciente">
              </div>
          </div>
          <div class="row">
            <div id="div_fechanacimiento_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Fecha de Nacimiento: </label>       
                <input type="date" class="form-control" id="fechanacimiento_paciente">
               </div>
            <div id="div_telefono_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="telefono_paciente">
            </div>
          </div>
          <div class="row">              
            <div id="div_direccion_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Dirección: </label>       
                <input type="text" class="form-control" id="direccion_paciente">
            </div>
            <div id="div_ciudad_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Ciudad: </label>       
                <input type="text" class="form-control" id="ciudad_paciente">
            </div>
          </div>
          <div class="row">
            <div id="div_ruta_img_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Ruta Imagen: </label>       
                <input type="text" class="form-control" id="ruta_img_paciente">
            </div>
            <div id="div_rutmedico_paciente" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Rut Medico: </label>       
                <input type="text" class="form-control" id="rutmedico_paciente">
            </div>
          </div>
          <div class="row">
              <div id="div_contrasena_paciente" class="form-group col-xs-12">
                  <label class="control-label"> Contraseña: </label>       
                  <input type="text" class="form-control" id="contrasena_paciente">
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button id="agregar_paciente" type="button" class="btn btn-primary">Agregar Paciente</button>
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

  $('#addPaciente').click(function(){
      $('#modal_add').modal('show');
  });

  $('#cancelar').click(function(){
      $('#modal_add').modal('hide');
  });

  $('#agregar_paciente').click(function(){
      function agregar_efecto_error(id){
              $(id).addClass("has-error");
              $(id).addClass('animated shake');
          }

            var estado = true;
            //limpiar_formulario();
            if($("#nombre_paciente").val().length == 0){
                agregar_efecto_error("#div_nombre_paciente");          
                estado = false;   
            }
            if($("#apellidoP_paciente").val().length == 0){
                agregar_efecto_error("#div_apellido_paterno");          
                estado = false;   
            }
            if($("#apellidoM_paciente").val().length == 0){
                agregar_efecto_error("#div_apellido_materno");          
                estado = false;   
            }
            if($("#rut_paciente").val() == 0){
                agregar_efecto_error("#div_rut_paciente");
                estado = false;
            }
            if($("#direccion_paciente").val() == 0){
                agregar_efecto_error("#div_direccion_paciente");
                estado = false;
            }
            if($("#ciudad_paciente").val() == 0){
                agregar_efecto_error("#div_ciudad_paciente");
                estado = false;
            }
            if($("#fechanacimiento_paciente").val() == 0){
                agregar_efecto_error("#div_fechanacimiento_paciente");
                estado = false;
            }
            if($("#telefono_paciente").val() == 0){
                agregar_efecto_error("#div_telefono_paciente");
                estado = false;
            }
            if($("#rutmedico_paciente").val() == 0){
                agregar_efecto_error("#div_rutmedico_paciente");
                estado = false;
            }
            if($("#ruta_img_paciente").val() == 0){
                agregar_efecto_error("#div_ruta_img_paciente");
                estado = false;
            }
            if($("#contrasena_paciente").val() == 0){
                agregar_efecto_error("#div_contrasena_paciente");
                estado = false;
            }

            if(estado){

              var datos = new FormData();
              datos.append('rut_paciente', $("#rut_paciente").val());
              datos.append('contrasena_paciente', $("#contrasena_paciente").val());
              datos.append('nombre_paciente', $("#nombre_paciente").val());
              datos.append('apellidoP_paciente', $("#apellidoP_paciente").val());
              datos.append('apellidoM_paciente', $("#apellidoM_paciente").val());
              datos.append('telefono_paciente', $("#telefono_paciente").val());
              datos.append('ciudad_paciente', $("#ciudad_paciente").val());
              datos.append('direccion_paciente', $("#direccion_paciente").val());
              datos.append('fechanacimiento_paciente', $("#fechanacimiento_paciente").val());
              datos.append('ruta_img_paciente', $("#ruta_img_paciente").val());
              datos.append('rutmedico_paciente', $("#rutmedico_paciente").val());
              datos.append('bandera', '1');
         
              $.ajax({
              async: false,
              type: 'POST',
              url: 'script_paciente.php',
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

        datos.append('rut_paciente', $('#id_oculto').val() );
        datos.append('contrasena_paciente', $('#editar_contrasenapaciente').val());
        datos.append('nombre_paciente', $('#editar_nombrepaciente').val());
        datos.append('apellidoP_paciente', $('#editar_apellidoPpaciente').val());
        datos.append('apellidoM_paciente', $('#editar_apellidoMpaciente').val());
        datos.append('fechanacimiento_paciente', $('#editar_fechapaciente').val());
        datos.append('ciudad_paciente', $('#editar_telefonopaciente').val());
        datos.append('direccion_paciente', $('#editar_direccionpaciente').val());
        datos.append('telefono_paciente', $('#editar_telefonopaciente').val());
        datos.append('ruta_img_paciente', $('#editar_img_paciente').val());
        datos.append('rutmedico_paciente', $('#editar_fk_paciente_medico').val());
 
        datos.append('bandera', "3");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_paciente.php',
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

function Editar_Paciente(id){
	
	var datos = new FormData();

        datos.append('id', id);
        datos.append('bandera', "2");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_paciente.php',
            data:datos,
            contentType:false,
            processData:false,
            cache:false,
            dataType: 'json',
            success: function (data){

            $('#id_oculto').val(data[0]);    
      		$('#editar_contrasenapaciente').val(data[1]); 
      		$('#editar_nombrepaciente').val(data[2]); 
   			$('#editar_apellidoPpaciente').val(data[3]); 
   			$('#editar_apellidoMpaciente').val(data[4]);
   			$('#editar_fechapaciente').val(data[5]);
   			$('#editar_ciudadpaciente').val(data[6]);
   			$('#editar_direccionpaciente').val(data[7]); 
      		$('#editar_telefonopaciente').val(data[8]); 
     		$('#editar_img_paciente').val(data[9]); 
      		$('#editar_fk_paciente_medico').val(data[10]); 
              

            }
      
            });
}

function Eliminar_Paciente(id){

	var datos = new FormData();
  $('#modal_eliminar').modal('show');

  $('#eliminar_paciente').click(function(){
        datos.append('id', id);
        datos.append('bandera', "4");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_paciente.php',
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
  $('#eliminar_cancelar').click(function(){
    $('#modal_eliminar').modal('hide');
  });
}
</script>
</body>
</html>