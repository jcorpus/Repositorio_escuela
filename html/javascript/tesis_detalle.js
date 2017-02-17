
$(document).ready(function(){
  listar_detalle_tesis();
});

function listar_detalle_tesis(){
	$.ajax({
		url:'controller/controller_detalle_publicacion.php',
		type: 'POST',
		data:{},
		beforeSend: function(){
			$("#loading_detail").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
		},
    complete: function(){
      $("#loading_detail").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
    },
		success: function(resp){
			if(resp.length>0){
			var valores = JSON.parse(resp);
      //alert(resp);
			var cadena = "";
			cadena += "<table class='table table-bordered table-hover '>";
			cadena += "<thead class=''>";
			cadena += "<tr>";
			cadena += "<th>#</th>";
			cadena += "<th>Titulo</th>";
			cadena += "<th>Fecha P.</th>";
			cadena += "<th>Hora</th>";
			cadena += "<th>Usuario</th>";
			cadena += "<th>Estado</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				//datos_array =valores[i][0]+" "+valores[i][1]+" "+valores[i][2]+" "+valores[i][3]+" "+valores[i][4]+" "+valores[i][5];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][1]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
        cadena += "<td>"+valores[i][4]+"</td>";
				cadena += "<td>"+valores[i][5]+"</td>";
        cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar_detalle").html(cadena);


			//http://codepen.io/Manoz/pen/pydxK

			}
			else{
				var nodatos = " NO HAY DATOS QUE MOSTRAR";
        $("#listar_detalle").html(nodatos);
      	alert(nodatos);
				console.log(nodatos);

			}


		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR");


		}




	});



}