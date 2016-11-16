function run_rec_password(e){
    if (e.keyCode == 13) {
      rec_password();
    }


}

function rec_password(){
  var emaill = document.getElementById("get_pass_user").value;
  var msjpass;
	$.ajax({
		url:'controller/controller_rec_pass.php',
		type: 'POST',
    data:'emaill='+emaill,
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Procesandooooo.....</p>'
    msjpass += '</div>';
    document.getElementById('msj_get_pass').innerHTML = msjpass;

		},
    complete: function(){
      $("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");

    },
		success: function(respuesta){

    document.getElementById('msj_get_pass').innerHTML = respuesta;

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
			alert("SE PRODUJO UN ERROR");


		}

	});

}
