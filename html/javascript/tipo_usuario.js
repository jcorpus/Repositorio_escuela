$(document).ready(function(){

cargar_tipo_usuario();

});
/*******tipo user ****/
function cargar_tipo_usuario(){
	$.ajax({
		url:'controller/controller_tipouser.php',
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
			$("#tipousuario_datos").html(cadena);
		}
		else{
			alert("no hay datos");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}
