<?php
	require_once("../conexion/bd.php");
	require_once("../controlador/clinica.controlador.php");

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
<div class="container">
  <?php include('barra.php'); ?>
  <br><br><br>
  <div class="container">
    <h1>Clinicas</h1>
  </div>
	
	<hr />
	<br>
	<table class="table table-striped">
		<thead>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Comuna</th>
      <th>Región</th>
			<th>telefono</th>
			<th></th>
			<th>Acciones</th>
		</thead>
		<tbody>
		<?php foreach(Obtener_Clinicas() AS $Clinica){ ?>
			<tr>	
				<td><?php echo $Clinica['nombre'];?></td>
				<td><?php echo $Clinica['direccion'];?></td>
        <td><?php echo $Clinica['comuna']; ?></td>
				<td><?php echo $Clinica['region']; ?></td>
				<td><?php echo $Clinica['telefono'];  ?></td>
				<td></td>
				<!--Completar con lo que sale en el bd tabla clinica -->
				<td>
				<button onclick="Editar_Clinica('<?php echo $Clinica['id_clinica']; ?>')" class="btn btn-warning editar" > Editar </button>
				<button onclick="Eliminar_Clinica('<?php echo $Clinica['id_clinica']; ?>')" class="btn btn-danger">  Eliminar </button>
				</td>
			</tr>
		<?php }?>
		</tbody>
		<tfoot>
			<!--<button class="btn btn-primary pull-right">Agregar</button>-->
		</tfoot>
	</table>
  <button id="addClinica" class="btn btn-primary col-md-push-3 right" type="button">Agregar</button>
</div>
<!--......../////........para la ventana editar...///////.....................-->
<div class="modal fade" tabindex="-1" role="dialog" id="modal_editar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Clinica</h4>
      </div>
      <div class="modal-body">
        <input type="text" id="id_oculto" >

  		 <div class="row">
            <div id="div_nombre" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Nombre: </label>       
                <input type="text" class="form-control" id="editar_nombreclinica">
            </div>
        </div>

  		 <div class="row">
            <div id="div_direccion" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Dirección: </label>       
                <input type="text" class="form-control" id="editar_direccionclinica">
            </div>
        </div>

         <div class="row">
            <div id="div_region" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Región: </label>       
                <input type="text" class="form-control" id="editar_regionclinica">
            </div>
        </div>

         <div class="row">
            <div id="div_comuna" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Comuna: </label>       
                <input type="text" class="form-control" id="editar_comunaclinica">
            </div>
        </div>

         <div class="row">
            <div id="div_telefono" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="editar_telefonoclinica">
            </div>
        </div>

         <div class="row">
            <div id="div_correo" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Correo: </label>       
                <input type="text" class="form-control" id="editar_correoclinica">
            </div>
         </div>

         <div class="row">
            <div id="div_contrasena" class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label"> Contraseña: </label>       
                <input type="text" class="form-control" id="editar_contrasenaclinica">
            </div>
         </div>

      </div>
      <div class="modal-footer">
        <button id="guardar_cambios" type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
								<!--............hasta aqui............-->

<!--......../////........para la ventana agregar...///////.....................-->
<div class="modal fade" tabindex="-1" role="dialog" id="modal_add">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Clinica</h4>
      </div>
      <div class="modal-body">

       <div class="row">
              <div id="div_nombre_clinica" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Nombre: </label>      
                <input type="text" class="form-control" id="nombre_clinica">
            </div>
            <div id="div_contrasena_clinica" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Contraseña: </label>       
                  <input type="text" class="form-control" id="contrasena_clinica">
              </div>
        </div>
       <div class="row">
              <div id="div_id_clinica" class="form-group col-xs-12">
                <label class="control-label"> Identificador </label>      
                <input type="text" class="form-control" id="id_clinica" >   
              </div>
          </div>
          <div class="row">
              <div id="div_direccion_clinica" class="form-group col-xs-12">
                  <label class="control-label"> Dirección: </label>       
                  <input type="text" class="form-control" id="direccion_clinica">
              </div>
          </div>
          <div class="row">
            <div id="div_region_clinica" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Región: </label>       
                  <input type="text" class="form-control" id="region_clinica">
              </div>
              <div id="div_comuna_clinica" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Comuna: </label>       
                  <input type="text" class="form-control" id="comuna_clinica">
              </div>
          </div>
          <div class="row">
              <div id="div_correo_clinica" class="form-group col-xs-12 col-sm-6">
                  <label class="control-label"> Correo: </label>       
                  <input type="text" class="form-control" id="correo_clinica">
            </div>
            
            <div id="div_telefono_clinica" class="form-group col-xs-12 col-sm-6">
                <label class="control-label"> Teléfono: </label>       
                <input type="text" class="form-control" id="telefono_clinica">
            </div>
          </div>      
      </div>
      <div class="modal-footer">
        <button id="agregar_clinica" type="button" class="btn btn-primary">Agregar Clinica</button>
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

  <div class="modal fade" tabindex="-1" role="dialog" id="modal_eliminar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Eliminar Clinica</h4>
      </div>
      <div class="modal-body">

       <div class="row">
              <div class="form-group col-xs-12">
                <label class="control-label"> Esta seguro que desea Elimiar</label>      
              </div>
        </div>
      <div class="modal-footer">
        <button id="eliminar_clinica" type="button" class="btn btn-danger">Eliminar</button>
        <button id="eliminar_cancelar" type="reset" class="btn btn-defauld">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                <!--............hasta aqui............-->

		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/bootbox.min.js"></script>	
<script>

$(document).ready(function(){

	$('#id_oculto').hide();

	$('.editar').click(function(){

		$('#modal_editar').modal('show');

	});

  $('#addClinica').click(function(){
      $('#modal_add').modal('show');
  });

  $('#cancelar').click(function(){
      $('#modal_add').modal('hide');
  });

  $('#agregar_clinica').click(function(){
      function agregar_efecto_error(id){
              $(id).addClass("has-error");
              $(id).addClass('animated shake');
          }

            var estado = true;
            //limpiar_formulario();
            if($("#nombre_clinica").val().length == 0){
                agregar_efecto_error("#div_nombre_clinica");          
                estado = false;
            }
            if($("#region_clinica").val().length == 0){
                agregar_efecto_error("#div_region_clinica");          
                estado = false;
            }
            if($("#comuna_clinica").val().length == 0){
                agregar_efecto_error("#div_comuna_clinica");          
                estado = false;                
            }
            if($("#direccion_clinica").val().length == 0){
                agregar_efecto_error("#div_direccion_clinica");
                estado = false;
            }
            if($("#id_clinica").val() == 0){
                agregar_efecto_error("#div_id_clinica");
                estado = false;
            }
            if($("#correo_clinica").val() == 0){
                agregar_efecto_error("#div_correo_clinica");
                estado = false;
            }
            if($("#telefono_clinica").val() == 0){
                agregar_efecto_error("#div_telefono_clinica");
                estado = false;
            }
            if($("#contrasena_clinica").val() == 0){
                agregar_efecto_error("#div_contrasena_clinica");
                estado = false;
            }
            if(estado){

              var datos = new FormData();
              datos.append('id_clinica', $("#id_clinica").val());
              datos.append('contrasena_clinica', $("#contrasena_clinica").val());
              datos.append('nombre_clinica', $("#nombre_clinica").val());
              datos.append('region_clinica', $("#region_clinica").val());
              datos.append('comuna_clinica', $("#comuna_clinica").val());
              datos.append('direccion_clinica', $("#direccion_clinica").val());
              datos.append('telefono_clinica', $("#telefono_clinica").val());
              datos.append('correo_clinica', $("#correo_clinica").val());
              datos.append('bandera', '1');
         
              $.ajax({
              async: false,
              type: 'POST',
              url: 'script_clinica.php',
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

        datos.append('id', $('#id_oculto').val() );
        datos.append('contrasena', $('#editar_contrasenaclinica').val());
        datos.append('nombre', $('#editar_nombreclinica').val());
        datos.append('direccion', $('#editar_direccionclinica').val());
        datos.append('comuna', $('#editar_comunaclinica').val());
        datos.append('region', $('#editar_regionclinica').val());
        datos.append('telefono', $('#editar_telefonoclinica').val());
        datos.append('correo', $('#editar_correoclinica').val());
        datos.append('bandera', "3");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_clinica.php',
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
	
function Editar_Clinica(id){
	
	var datos = new FormData();

        datos.append('id', id);
        datos.append('bandera', "2");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_clinica.php',
            data:datos,
            contentType:false,
            processData:false,
            cache:false,
            dataType: 'json',
            success: function (data){

      			$('#id_oculto').val(data[0]);    
      			$('#editar_contrasenaclinica').val(data[1]); 
      			$('#editar_nombreclinica').val(data[2]); 
      			$('#editar_direccionclinica').val(data[5]); 
      			$('#editar_comunaclinica').val(data[4]); 
            $('#editar_regionclinica').val(data[3]);
      			$('#editar_telefonoclinica').val(data[6]); 
      			$('#editar_correoclinica').val(data[7]);            

            }
      
            });
}

function Eliminar_Clinica(id){

	var datos = new FormData();
  $('#modal_eliminar').modal('show');

  $('#eliminar_clinica').click(function(){
      datos.append('id', id);
        datos.append('bandera', "4");

        $.ajax({
            async: false,
            type: 'POST',
            url: 'script_clinica.php',
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