
function buscar_tesis(){

  var busqueda = document.getElementById("busqueda_tesis").value;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/busqueda_tesis.php',
		type: 'POST',
    data: busqueda,
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    contentType: false, //"application / x-www-form-urlencoded"
    processData: false, //
		beforeSend: function(){
      alert("enviandoo....");

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      alert("se completo el envio");
    },
		success: function(data){
    //limpiar_datos_tesis();
    document.getElementById('respuesta_tesis').innerHTML = data;

		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR, vuelve a recargar la pagina");


		}

	});


}