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
/******************validar radio*********************/
function radio_validate(){
  var opciones = document.getElementsByName("sexo_user");
  radioo = false;
  for (var i = 0; i < opciones.length; i++) {
    if(opciones[i].checked){
      radioo = true;
      break;
    }
  }
  if (!radioo){
      //alert("falta el sexo");
      radioo = false;
  }
    return radioo;
}

/****************Validar campos vacios*************/
function validate () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_usuario input.validacion');

    valido = true; // es valido hasta demostrar lo contrario
    // recorremos todos los campos
    [].slice.call(campos).forEach(function(campo) {
        //console.log(campo.value.trim());

        if (campo.value.trim() === '') {
            valido = false;
        }
    });

    if (valido) {
      //alert("validoo");
      valido = true;
    } else {
      resp = '<div class="alert alert-warning alert-dismissible" id="">';
      resp += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      resp += 'Faltan Datos &nbsp;<i class="icon fa fa-times"></i>';
      resp += '</div>';
      __("resp_user").innerHTML = resp;
      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/


function registrar_usuario(){
  var respuesta2 = radio_validate();
  var respuesta = validate();
  console.log("respuesta2 "+respuesta2);
  console.log("respuesta "+respuesta);

  if (respuesta && respuesta2) {

          var resultado;
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
               success: function(data)
               {
                     __("resp_user").innerHTML = data;
                  if(data === 'ok'){

                    console.log("datos: "+data);
                    resultado = '<div class="alert alert-success alert-dismissible" id="">';
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


  }else{
    alert("faltan datos");
  }




}
