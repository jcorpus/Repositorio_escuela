
function __(id){
  return document.getElementById(id);
}

/****************Validar campos vacios*************/
function validate () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_tesis input.validacion');

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
      //__("msj_res_tesis").innerHTML = resp;
      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/

function reg_tesis(){

  var respuesta = validate();
  console.log("respuesta "+respuesta);

  if (respuesta) {

  //var emaill = document.getElementById("get_pass_user").value;
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
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_res_tesis').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){

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
  msjpass += ' <p> Faltan Datos </p>'
  msjpass += '</div>';
  document.getElementById('msj_res_tesis').innerHTML = msjpass;
}

}





/**combos**/


$(document).ready(function(){

cargar_grado_academico();
cargar_estado_publicacion();
cargar_categoria_tesis();

});

function cargar_grado_academico(){
	$.ajax({
		url:'controller/controller_filial.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#filial_datos").html(cadena);
		}
		else{
			alert("no hay datos en la filial");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}

/**estado de publicacion**/
function cargar_estado_publicacion(){
	$.ajax({
		url:'controller/controller_filial.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#filial_datos").html(cadena);
		}
		else{
			alert("no hay datos en la filial");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}

/**categoria de tesis**/
function cargar_categoria_tesis(){
	$.ajax({
		url:'controller/controller_filial.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#filial_datos").html(cadena);
		}
		else{
			alert("no hay datos en la filial");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}






