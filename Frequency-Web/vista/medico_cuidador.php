<?php
	require_once("../conexion/bd.php");
	require_once("../controlador/cuidador.controlador.php");

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
	<h1>Cuidador</h1>
	<hr />
	<br>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th></th>
			<th>Acciones</th>
		</thead>
		<tbody>
		<?php foreach(Obtener_Cuidador() AS $Cuidador){ ?>
			<tr>	
				<td><?php echo $Cuidador['nombre'];?></td>
				<td><?php echo $Cuidador['apellido_p'];?></td>
				<td><?php echo $Cuidador['apellido_m']; ?></td>
				<td><?php echo $Cuidador['direccion']; ?></td>
				<td><?php echo $Cuidador['telefono'];  ?></td>
				<td></td>
				<!--Completar con lo que sale en el bd tabla clinica -->
				<td>
				<button onclick="Editar_Cuidador('<?php echo $Cuidador['id_cuidador']; ?>')" class="btn btn-warning editar"> Editar </button>
				<button onclick="Eliminar_Cuidador('<?php echo $Cuidador['id_cuidador']; ?>')" class="btn btn-danger">  Eliminar </button>
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
          <h4 class="modal-title">Eliminar Cuidador</h4>
        </div>
      <div class="modal-body">

       <div class="row">
              <div class="form-group col-xs-12">
                <label class="control-label"> Esta seguro que desea Elimiar</label>      
              </div>
        </div>
      <div class="modal-footer">
        <button id="eliminar_cuidador" type="button" class="btn btn-danger">Eliminar</button>
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
        <h4 class="modal-title">Editar Cuidador</h4>
      </div>
      <div class="modal-body">
      

        <input type="text" id="id_oculto" >

  		 <div class="row">
            <div id="div_nombre" class="form-group col-xs-12">
                <label class="control-label"> Nombre: </label>       
                <input type="text" class="form-control" id="editar_nombrecuidador">
            </div>
        </div>

  		 <div class="row">
            <div id="div_apellidoP" class="form-group col-xs-12">
                <label class="control-label"> Apellido Paterno: </label>       
                <input type="text" class="form-control" id="editar_apellidoPcuidador">
            </div>
        </div>

         <div class="row">
            <div id="div_apellidoM" class="form-group col-xs-12">
                <label class="control-label"> Apellido Materno: </label>       
                <input type="text" class="form-control" id="editar_apellidoMcuidador">
            </div>
        </div>

         <div class="row">
            <div id="div_direccion" class="form-group col-xs-12">
                <label class="control-label"> Dirección: </label>       
                <input type="text" class="form-control" id="editar_direccioncuidador">
            </div>
        </div>

         <div class="row">
            <div id="div_telefono" class="form-group col-xs-12">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="editar_telefonocuidador">
            </div>
        </div>

         <div class="row">
            <div id="div_correo" class="form-group col-xs-12">
                <label class="control-label"> Correo: </label>       
                <input type="text" class="form-control" id="editar_correocuidador">
            </div>
         </div>

         <div class="row">
            <div id="div_contrasena" class="form-group col-xs-12 ">
                <label class="control-label"> Contraseña: </label>       
                <input type="text" class="form-control" id="editar_contrasenacuidador">
            </div>
         </div>

         <div class="row">
            <div id="div_rol" class="form-group col-xs-12">
                <label class="control-label"> Rol: </label>       
                <input type="text" class="form-control" id="editar_rolcuidador">
            </div>
         </div>

		<div class="row">
            <div id="div_img" class="form-group col-xs-12">
                <label class="control-label"> Imagen: </label>       
                <input type="text" class="form-control" id="editar_img_cuidador">
            </div>
         </div>

         <div class="row">
            <div id="div_fk_paciente" class="form-group col-xs-12 ">
                <label class="control-label"> NOSE: </label>       
                <input type="text" class="form-control" id="editar_fk_paciente_cuidador">
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
        <h4 class="modal-title">Agregar Cuidador</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div id="div_rut_cuidador" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Rut: </label>      
                <input type="text" class="form-control" id="rut_cuidador" >   
              </div>
              <div id="div_nombre_cuidador" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Nombres: </label>      
                <input type="text" class="form-control" id="nombre_cuidador">
            </div>
          </div>

          <div class="row">
            <div id="div_apellido_paterno" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Apellido Paterno: </label>       
                  <input type="text" class="form-control" id="apellidoP_cuidador">
              </div>
              <div id="div_apellido_materno" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Apellido Materno: </label>       
                  <input type="text" class="form-control" id="apellidoM_cuidador">
              </div>
          </div>

          <div class="row">
              <div id="div_direccion_cuidador" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label class="control-label"> Dirección: </label>       
                  <input type="text" class="form-control" id="direccion_cuidador">
              </div>
          </div>
          <div class="row">
              <div id="div_correo_cuidador" class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <label class="control-label"> Correo: </label>       
                  <input type="text" class="form-control" id="correo_cuidador">
            </div>
            
            <div id="div_telefono_cuidador" class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="telefono_cuidador">
            </div>
          </div>

      <div class="row">
              <div id="div_rol_cuidador" class="form-group col-xs-12 col-sm-4">
                  <label class="control-label"> Rol: </label>       
                  <input type="text" class="form-control" id="rol_cuidador">
            </div>
            
            <div id="div_ruta_img_cuidador" class="form-group col-xs-12 col-sm-4">
                <label class="control-label"> Ruta Imagen: </label>       
                <input type="text" class="form-control" id="ruta_img_cuidador">
            </div>

            <div id="div_fk_Paciente_cuidador" class="form-group col-xs-12 col-sm-4">
                <label class="control-label"> Paciente: </label>       
                <input type="text" class="form-control" id="fk_Paciente_cuidador">
            </div>
          </div>

          <div class="row">
              <div id="div_contrasena_cuidador" class="form-group col-xs-12">
                  <label class="control-label"> Contraseña: </label>       
                  <input type="text" class="form-control" id="contrasena_cuidador">
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
            if($("#nombre_cuidador").val().length == 0){

                agregar_efecto_error("#div_nombre_cuidador");          
                estado = false;
                
            }

            if($("#apellidoP_cuidador").val().length == 0){

                agregar_efecto_error("#div_apellido_paterno");          
                estado = false;
                
            }

            if($("#apellidoM_cuidador").val().length == 0){

                agregar_efecto_error("#div_apellido_materno");          
                estado = false;
                
            }


            if($("#direccion_cuidador").val().length == 0){

                agregar_efecto_error("#div_direccion_cuidador");
                estado = false;

            }

            if($("#rut_cuidador").val() == 0){

                agregar_efecto_error("#div_rut_cuidador");
                estado = false;

            }

            if($("#correo_cuidador").val() == 0){

                agregar_efecto_error("#div_correo_cuidador");
                estado = false;

            }

            if($("#telefono_cuidador").val() == 0){

                agregar_efecto_error("#div_telefono_cuidador");
                estado = false;

            }

            if($("#rol_cuidador").val() == 0){

                agregar_efecto_error("#div_rol_cuidador");
                estado = false;

            }
              // contra
            if($("#fk_Paciente_cuidador").val() == 0){

              agregar_efecto_error("#div_fk_Paciente_cuidador");
                estado = false;

            }

            if($("#ruta_img_cuidador").val() == 0){

                agregar_efecto_error("#div_ruta_img_cuidador");
                estado = false;

            }

            if($("#contrasena_cuidador").val() == 0){

                agregar_efecto_error("#div_contrasena_cuidador");
                estado = false;
            }

            if(estado){

              var datos = new FormData();
              datos.append('rut_cuidador', $("#rut_cuidador").val());
              datos.append('contrasena_cuidador', $("#contrasena_cuidador").val());
              datos.append('nombre_cuidador', $("#nombre_cuidador").val());
              datos.append('apellidoP_cuidador', $("#apellidoP_cuidador").val());
              datos.append('apellidoM_cuidador', $("#apellidoM_cuidador").val());
              datos.append('direccion_cuidador', $("#direccion_cuidador").val());
              datos.append('correo_cuidador', $("#correo_cuidador").val());
          datos.append('telefono_cuidador', $("#telefono_cuidador").val());
              datos.append('rol_cuidador', $("#rol_cuidador").val());
              datos.append('ruta_img_cuidador', $("#ruta_img_cuidador").val());
              datos.append('fk_Paciente_cuidador', $("#fk_Paciente_cuidador").val());
              datos.append('bandera', '1');
         
              $.ajax({
              async: false,
              type: 'POST',
              url: 'script_cuidador.php',
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

        datos.append('rut_cuidador', $('#id_oculto').val() );
        datos.append('contrasena_cuidador', $('#editar_contrasenacuidador').val());
        datos.append('nombre_cuidador', $('#editar_nombrecuidador').val());
        datos.append('apellidoP_cuidador', $('#editar_apellidoPcuidador').val());
        datos.append('apellidoM_cuidador', $('#editar_apellidoMcuidador').val());
        datos.append('direccion_cuidador', $('#editar_direccioncuidador').val());
        datos.append('correo_cuidador', $('#editar_correocuidador').val());
        datos.append('telefono_cuidador', $('#editar_telefonocuidador').val());
        datos.append('rol_cuidador', $('#editar_rolcuidador').val());
        datos.append('ruta_img_cuidador', $('#editar_img_cuidador').val());
        datos.append('fk_paciente_cuidador', $('#editar_fk_paciente_cuidador').val());
        datos.append('bandera', "3");


        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_cuidador.php',
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

	
function Editar_Cuidador(id){
	
	var datos = new FormData();

        datos.append('id', id);
        datos.append('bandera', "2");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_cuidador.php',
            data:datos,
            contentType:false,
            processData:false,
            cache:false,
            dataType: 'json',
            success: function (data){

             	$('#id_oculto').val(data[0]);    
      			$('#editar_contrasenacuidador').val(data[1]); 
      			$('#editar_nombrecuidador').val(data[2]); 
      			$('#editar_apellidoPcuidador').val(data[3]); 
      			$('#editar_apellidoMcuidador').val(data[4]);
      			$('#editar_direccioncuidador').val(data[5]); 
      			$('#editar_correocuidador').val(data[6]); 
      			$('#editar_telefonocuidador').val(data[7]); 
      			$('#editar_rolcuidador').val(data[8]); 
      			$('#editar_img_cuidador').val(data[9]); 
      			$('#editar_fk_paciente_cuidador').val(data[10]); 

            }
      
            });
}


function Eliminar_Cuidador(id){

	var datos = new FormData();

        datos.append('id', id);
        datos.append('bandera', "4");
        $('#modal_eliminar').modal('show');

  $('#eliminar_cancelar').click(function(){
    $('#modal_eliminar').modal('hide');
  });

  $('#eliminar_cuidador').click(function(){

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_cuidador.php',
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