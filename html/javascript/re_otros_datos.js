function reg_tipo_user(){
  
  var tipo_usuario = document.getElementById("tipo_usuario_o").value;

  if (true) {
  //var emaill = document.getElementById("get_pass_user").value;
  var msjpass;
  
	$.ajax({
		url:'controller/controller_otros_datos.php',
		type: 'POST',
    data: 'tipo_usuario='+tipo_usuario+'&dato=r_titpo_user',
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_otros_datos').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    document.getElementById('msj_otros_datos').innerHTML = data;
    $("#tipo_usuario_o").val('');
    
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
  document.getElementById('msj_otros_datos').innerHTML = msjpass;
}

}

/**********TIPO DE TESIS**********/
function reg_tipo_tesis(){
  var tipo_tesis = document.getElementById("tipo_tesis_o").value;

  if (true) {
  //var emaill = document.getElementById("get_pass_user").value;
  var msjpass;
  
	$.ajax({
		url:'controller/controller_otros_datos.php',
		type: 'POST',
    data: 'tipo_tesis='+tipo_tesis+'&dato=r_tipo_tesis',
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_otros_datos').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    document.getElementById('msj_otros_datos').innerHTML = data;
    $("#tipo_tesis_o").val('');
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
  document.getElementById('msj_otros_datos').innerHTML = msjpass;
}

}


/**********GRADO ACADEMICO**********/
function reg_grado_academico(){
  var grado_academico = document.getElementById("grado_academico_o").value;
  if (true) {
  var msjpass;
  
	$.ajax({
		url:'controller/controller_otros_datos.php',
		type: 'POST',
    data: 'grado_academico_o='+grado_academico+'&dato=r_grado_academico',
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_otros_datos').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    document.getElementById('msj_otros_datos').innerHTML = data;
    $("#grado_academico_o").val('');
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
  document.getElementById('msj_otros_datos').innerHTML = msjpass;
}

}


/**********FILIAL**********/
function reg_filial(){
  var filial_e = document.getElementById("filial_o").value;
  if (true) {
  var msjpass;
  
	$.ajax({
		url:'controller/controller_otros_datos.php',
		type: 'POST',
    data: 'filial_e='+filial_e+'&dato=r_filial',
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_otros_datos').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    document.getElementById('msj_otros_datos').innerHTML = data;
    $("#filial_o").val('');
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
  document.getElementById('msj_otros_datos').innerHTML = msjpass;
}

}


/**********CATEGORIA DE TESIS**********/
function reg_categoria(){
  var categoria_o = document.getElementById("categoria_o").value;
  if (true) {
  var msjpass;
  
	$.ajax({
		url:'controller/controller_otros_datos.php',
		type: 'POST',
    data: 'categoria_o='+categoria_o+'&dato=r_categoria_tesis',
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_otros_datos').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){
    document.getElementById('msj_otros_datos').innerHTML = data;
    $("#categoria_o").val('');
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
  document.getElementById('msj_otros_datos').innerHTML = msjpass;
}

}










