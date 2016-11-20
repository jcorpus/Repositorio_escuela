function run_rec_password(e){
    if (e.keyCode == 13) {

    }


}

function __(id){
  return document.getElementById(id);
}


function reg_alumno(){

  //var emaill = document.getElementById("get_pass_user").value;
  var formalumno = new FormData($("#formulario_alumno")[0]);

  var msjpass;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_alumno.php',
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
    document.getElementById('msj_res_alumno').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_res_alumno').innerHTML = data;

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

}
