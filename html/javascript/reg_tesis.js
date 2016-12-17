
function __(id){
  return document.getElementById(id);
}


$(document).ready(function(){



});

/****************Validar campos vacios*************/
function validate () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_tesis input.validacion');

    valido = true;
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
      //__("msj_res_tesis").innerHTML = resp;
      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/

function reg_tesis(){


  //tamaño archivo js http://stackoverflow.com/questions/15900485/correct-way-to-convert-size-in-bytes-to-kb-mb-gb-in-javascript

  var respuesta = validate();
  console.log("respuesta "+respuesta);

  if (respuesta) {

  //var usuario_id = document.getElementById("user_id").value;
  var formtesis = new FormData($("#formulario_tesis")[0]);

  var msjpass;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_tesis.php',
		type: 'POST',
    data: formtesis,
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    contentType: false, //"application / x-www-form-urlencoded"
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Registrando... &nbsp<i class="fa fa-cog fa-spin fa-2x"></i> .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_res_tesis').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    //limpiar_datos_tesis();
    document.getElementById('msj_res_tesis').innerHTML = data;

    /*

			if(respuesta.length>0){
        msjpass = '<div class="alert alert-dismissible alert-success"> ';
        msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        msjpass += ' <p> Enviado Correctamente</p>'
        msjpass += '</div>';
        document.getElementById('msj_get_pass').innerHTML = msjpass;

			}else{


			}
      */

		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR, vuelve a recargar la pagina");


		}

	});

}else{
  msjpass = '<div class="alert alert-dismissible alert-warning"> ';
  msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  msjpass += '<p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Faltan Datos...</p>'
  msjpass += '</div>';
  document.getElementById('msj_res_tesis').innerHTML = msjpass;
}

}



function limpiar_datos_tesis(){

    
  
  //$("#codigo").val('');
  $("#nombre_tesis").val('');
  $("#autor_tesis").val('');
  $("#cita_tesis").val('');
  $("#resumen_tesis").val('');
  $("#pclaves_tesis").val('');
  $("#nombre_tesis").val('');
  
  
  
}









