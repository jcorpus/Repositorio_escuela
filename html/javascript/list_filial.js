$(document).ready(function(){

cargar_filial();
cargar_tipo_tesis();

});

function cargar_filial(){
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


/*******tipo de tesis ****/
function cargar_tipo_tesis(){
	$.ajax({
		url:'controller/controller_tipotesis.php',
		type:'POST',
		data:{}
	}).done(function(data){
		//Convierte una cadena de la notación de objetos de JavaScript (JSON) en un objeto.
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#tipotesis_datos").html(cadena);
		}
		else{
			alert("no hay datos en el tipo de tesis");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}
