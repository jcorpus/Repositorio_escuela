/*
0	No inicializado (objeto creado, pero no se ha invocado el método open)
1	Cargando (objeto creado, pero no se ha invocado el método send)
2	Cargado (se ha invocado el método send, pero el servidor aún no ha respondido)
3	Interactivo (se han recibido algunos datos, aunque no se puede emplear la propiedad responseText)
4	Completo (se han recibido todos los datos de la respuesta del servidor)
*/

function __(id) {
  return document.getElementById(id);
}

function registrar_usuario(){


      var formuser = new FormData($("#formulario_usuario")[0]);

      $.ajax({
            //url: 'ajax.php?mode=reg_user',
            url: 'controller/controller_user.php',
            type: 'POST',
            data: formuser,
            cache:false,
           contentType: false,
           processData: false,
           beforeSend:function(){


              alert("enviando");

           },
           success: function(datos)
           {
                 __("resp_user").innerHTML = datos;
              if(datos=='1'){
                console.log("datos: "+datos);
                resultado = '<div class="alert alert-success alert-dismissible" id="correcto">';
                resultado += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                resultado += 'Alumno Registrado Correctamente &nbsp;<i class="icon fa fa-check"></i>';
                resultado += '</div>';
                __("resp_user").innerHTML = resultado;
                limpiar_alumno();
              }
              else{

                resultado = '<div class="alert alert-warning alert-dismissible" id="correcto">';
                resultado += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                resultado += 'Enviando datos&nbsp;<i class="icon fa fa-check"></i>';
                resultado += '</div>';
                __("resp_user").innerHTML = resultsado;
              }
           },error: function(jqXHR, textStatus, errorThrown)
          {
            // Handle errors here
            console.log('ERRORRR: ' + textStatus);
            console.log('ERRORRR: ' + jqXHR);
            console.log('ERRORRR: ' + errorThrown);
            // errores
          }
       });

































}
