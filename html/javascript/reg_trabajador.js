
function __(id){
  return document.getElementById(id);
}
function validar_email_trabajador(){
    var email = $("#email_trabajador");
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email.val() == '' || !re.test(email.val()))
    {
      $("#email_trabajador").addClass('error_email');
      $("#email_trabajador").removeClass('email_valido');
      $(".mail_incorrecto").html("Email incorrecto");
      return false;
    }
     else{
       $("#email_trabajador").removeClass('error_email');
       $("#email_trabajador").addClass('email_valido');
       $(".mail_incorrecto").html("");
       return true;
     }

}
/******************validar radio*********************/
function radio_validate_trab(){
  var opciones = document.getElementsByName("sexo_trabajador");
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
function validate_trab () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_trabajador input.validacion');

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

      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/

function reg_trabajador(){
  var validar_email =validar_email_trabajador();
  console.log("el email trae: "+validar_email);
  var respuesta2 = radio_validate_trab();
  var respuesta = validate_trab();
  console.log("respuesta2 "+respuesta2);
  console.log("respuesta "+respuesta);

  if (validar_email && respuesta && respuesta2) {

  //var emaill = document.getElementById("get_pass_user").value;
  var formalumno = new FormData($("#formulario_trabajador")[0]);

  var msjpass;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_trabajador.php',
		type: 'POST',
    data: formalumno,
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    contentType: false, //"application / x-www-form-urlencoded"
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_res_trabajador').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_res_trabajador').innerHTML = data;

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
  document.getElementById('msj_res_trabajador').innerHTML = msjpass;
}

}
