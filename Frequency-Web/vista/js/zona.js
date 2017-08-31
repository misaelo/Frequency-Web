$(document).ready(function() {

        $("#agregar_zona").click(function(){

          $('#agregar_zona_modal').modal('show');

        });

        function limpiar_combobox_provincia(){

          $('#provincia_zona').empty();
          var provincia_zona = document.getElementById('provincia_zona');   
          var opcion_0 = document.createElement("option");
          opcion_0.value = 0;
          opcion_0.text = "Seleccione una opción";
          provincia_zona.appendChild(opcion_0);

        }

        function limpiar_combobox_ciudad(){
          
          $('#ciudad_zona').empty();
          var ciudad_zona = document.getElementById('ciudad_zona');   
          var opcion_0 =document.createElement("option");
          opcion_0.value = 0;
          opcion_0.text = "Seleccione una opción";
          ciudad_zona.appendChild(opcion_0);

        }

        $("#cerrar_modal_agregar_zona").click(function(){

            limpiar_combobox_provincia();
            limpiar_combobox_ciudad();
           
        });
      
      });