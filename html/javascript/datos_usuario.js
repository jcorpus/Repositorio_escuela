


function validar_email_alumno(){
    var email = $("#email_alumno");
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email.val() == '' || !re.test(email.val()))
    {
      $("#email_alumno").addClass('error_email');
      $("#email_alumno").removeClass('email_valido');
      $(".mail_incorrecto").html("Email incorrecto");
      return false;
    }
     else{
       $("#email_alumno").removeClass('error_email');
       $("#email_alumno").addClass('email_valido');
       $(".mail_incorrecto").html("");
       return true;
     }

}

/****************Validar campos vacios*************/
function validate () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_alumno input.validacion');

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
      //__("msj_res_alumno").innerHTML = resp;
      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/

function cambiar_datos_user(){

var email_user,password,msj_user_mod;

  password_userp = document.getElementById("password_userp").value;
  imagen_user = 'imagen.png';
  if (true) {
  var msjpass;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_perfil.php',
		type: 'POST',
    data: 'password_userp=' + password_userp +'&imagen_user='+imagen_user,
    
		beforeSend: function(){
      msj_user_mod = '<div class="alert alert-dismissible alert-success"> ';
      msj_user_mod += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      msj_user_mod += ' <p><i class="fa fa-refresh fa-spin fa-fw"></i> Enviando</p>'
      msj_user_mod += '</div>';
      document.getElementById('resp_user_mod').innerHTML = msj_user_mod;
		},
    complete: function(){
      
      alert("se completo el envio");
    },
		success: function(data){
      //alert(data);
    document.getElementById('resp_user_mod').innerHTML = data;

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
  msjpass += ' <p> Faltan Datos </p>'
  msjpass += '</div>';
  document.getElementById('msj_res_alumno').innerHTML = msjpass;
}

}
