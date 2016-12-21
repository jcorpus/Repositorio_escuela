

function Listar_tesis(filial){
	$.ajax({
		url:'controller/busqueda_tesis_filial.php',
		type:'POST',
		data:{
       filial:filial
		}
	})
	.done(function(resp){
		var data = JSON.parse(resp);
		if (data.length>0) {
			var cadena = "";
			for (var i = 0; i < data.length; i++) {
			 	cadena += "<tr>";
			 	cadena += "<td>"+data[i][0]+"</td>";
			 	cadena += "<td>"+data[i][1]+"</td>";
			 	cadena += "<td>"+data[i][2]+"</td>";
			 	
			 	cadena += "</tr>";
			 } 
			 $("#tbody_lista_tesis").html(cadena);
		}
		else{
			var cadena = "<p>Datos no encontrador</p>";
			$("#tbody_lista_tesis").html(cadena);	
		}
	})
}


