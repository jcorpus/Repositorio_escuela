
 $(document).ready(function(){
    listar_alumnos_tesis('','1');
    listar_alumnos_tesis2('','1');
    $(".oculto").hide();

  });


function busca_alumno_tesis(){
	var bus = $("#datos_alumno").val();
	listar_alumnos_tesis(bus,'1');

}
function busca_alumno_tesis2(){
	var bus = $("#datos_alumno2").val();
	listar_alumnos_tesis2(bus,'1');

}


function listar_alumnos_tesis(valor,pagina){

	var pagina = Number(pagina);
	$.ajax({
		url:'controller/controller_list_alumno2.php',
		type: 'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
		beforeSend: function(){
			//<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			//alert("enviando");
			$("#loading_alumno2").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
			//$("#cargando").show();

		},
    complete: function(){
      $("#loading_alumno2").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
    },
		success: function(resp){
			if(resp.length>0){
			var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
			var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
			//alert("los valores son: "+valores.length); //son 5
			var cadena = "";
			cadena += "<table class='table table-bordered table-hover '>";
			cadena += "<thead class=''>";
			cadena += "<tr>";
      cadena += "<th>Seleccionar</th>";
			cadena += "<th>#</th>";
			cadena += "<th>Nombres</th>";
			cadena += "<th>Ape P</th>";
			cadena += "<th>Ape M</th>";
			cadena += "<th>DNI</th>";
			cadena += "<th>Código</th>";
			cadena += "<th>Email</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				datos_array =valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
        cadena += "<td><button type='button'  onclick='seleccionar_alumno("+'"'+datos_array+'"'+");' class='btn btn-success seleccionar btn-sm' ><i class='fa fa-check' aria-hidden='true'></i>&ensp;Select</button></td>";
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][1]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
				cadena += "<td>"+valores[i][4]+"</td>";
				cadena += "<td>"+valores[i][5]+"</td>";
				cadena += "<td>"+valores[i][6]+"</td>";
				cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar_t").html(cadena);

			var totaldatos = datos[1];
			//alert("total de datos"+totaldatos);
			var numero_paginas = Math.ceil(totaldatos/5); //el Math.ceil acerca el resultado al próximo entero
			//alert("total de paginas"+numero_paginas);
			var datos_alumno = $("#datos_alumno").val();


			var paginar = "<ul class='pagination'>";
			if(pagina>1){

				//entidad html «  equivale a = &laquo
				//entidad html ‹  equivale a = &lsaquo
				//entidad html ›  equivale a = &rsaquo
				//entidad html »  equivale a = &raquo

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis("+'"'+datos_alumno+'","'+1+'"'+")'>&laquo;</a></li>";
				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis("+'"'+datos_alumno+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";



			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Anterior</a></li>";

			}

			limite = 10;
			div = Math.ceil(limite/2);
			pagina_inicio = (pagina > div) ? (pagina - div):1;
			if(numero_paginas > div){
				pagina_restante = numero_paginas - pagina;
				pagina_fin = (pagina_restante > div) ? (pagina + div) : numero_paginas;

			}
			else{
				pagina_fin = numero_paginas;

			}

			////////////////////////////////////////////////////////
			for(i = pagina_inicio;i<=pagina_fin;i++){
				if(i==pagina){
					paginar +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				}
				else{
					paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis("+'"'+datos_alumno+'","'+i+'"'+")'>"+i+"</a></li>";
				}


			}

			if(pagina < numero_paginas){

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis("+'"'+datos_alumno+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis("+'"'+datos_alumno+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";

			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
			}

			paginar += "</ul>";
			$("#paginador_alumno_t").html(paginar);
      
      $(".seleccionar").click(function(){
			 		$('#myModal_buscar_alumno').modal('hide');
			    });
      
      
			}
			else{
				var nodatos = " NO HAY DATOS QUE MOSTRAR";
      	alert(nodatos);
				console.log(notados);
			}


		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR");


		}




	});



}

var contadorr = 0;
function seleccionar_alumno(datos){

	var valores=datos.split("*");
	//alert(d.length);
	$("#autor_tesis").val(valores[1]+" "+valores[2]+" "+valores[3]);
  $("#autor_tesis_2").val(valores[1]+" "+valores[2]+" "+valores[3]);
  //$("#autor_tesis_2").val()+$("#autor_tesis_2").val(valores[1]+" "+valores[2]+" "+valores[3]) ;
    
  contadorr = contadorr + 1;
  
  if (contadorr > 0) {
    //alert("vale mas de 1");
    //$("#autor_tesis_3").val(valores[1]+" "+valores[2]+" "+valores[3]);
    console.log("vale:"+valores[1]+" "+valores[2]+" "+valores[3]);
  }
    
    
}


/////////////////////////
function listar_alumnos_tesis2(valor,pagina){

	var pagina = Number(pagina);
	$.ajax({
		url:'controller/controller_list_alumno2.php',
		type: 'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
		beforeSend: function(){
			//<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			//alert("enviando");
			$("#loading_alumno2").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
			//$("#cargando").show();

		},
    complete: function(){
      $("#loading_alumno2").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
    },
		success: function(resp){
			if(resp.length>0){
			var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
			var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
			//alert("los valores son: "+valores.length); //son 5
			var cadena = "";
			cadena += "<table class='table table-bordered table-hover '>";
			cadena += "<thead class=''>";
			cadena += "<tr>";
      cadena += "<th>Seleccionar</th>";
			cadena += "<th>#</th>";
			cadena += "<th>Nombres</th>";
			cadena += "<th>Ape P</th>";
			cadena += "<th>Ape M</th>";
			cadena += "<th>DNI</th>";
			cadena += "<th>Código</th>";
			cadena += "<th>Email</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				datos_array =valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
        cadena += "<td><button type='button'  onclick='seleccionar_alumno2("+'"'+datos_array+'"'+");' class='btn btn-success seleccionar btn-sm' ><i class='fa fa-check' aria-hidden='true'></i>&ensp;Select</button></td>";
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][1]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
				cadena += "<td>"+valores[i][4]+"</td>";
				cadena += "<td>"+valores[i][5]+"</td>";
				cadena += "<td>"+valores[i][6]+"</td>";
				cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar_t2").html(cadena);

			var totaldatos = datos[1];
			//alert("total de datos"+totaldatos);
			var numero_paginas = Math.ceil(totaldatos/5); //el Math.ceil acerca el resultado al próximo entero
			//alert("total de paginas"+numero_paginas);
			var datos_alumno = $("#datos_alumno2").val();


			var paginar = "<ul class='pagination'>";
			if(pagina>1){

				//entidad html «  equivale a = &laquo
				//entidad html ‹  equivale a = &lsaquo
				//entidad html ›  equivale a = &rsaquo
				//entidad html »  equivale a = &raquo

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis2("+'"'+datos_alumno+'","'+1+'"'+")'>&laquo;</a></li>";
				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis2("+'"'+datos_alumno+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";



			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Anterior</a></li>";

			}

			limite = 10;
			div = Math.ceil(limite/2);
			pagina_inicio = (pagina > div) ? (pagina - div):1;
			if(numero_paginas > div){
				pagina_restante = numero_paginas - pagina;
				pagina_fin = (pagina_restante > div) ? (pagina + div) : numero_paginas;

			}
			else{
				pagina_fin = numero_paginas;

			}

			////////////////////////////////////////////////////////
			for(i = pagina_inicio;i<=pagina_fin;i++){
				if(i==pagina){
					paginar +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				}
				else{
					paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis2("+'"'+datos_alumno+'","'+i+'"'+")'>"+i+"</a></li>";
				}


			}

			if(pagina < numero_paginas){

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis2("+'"'+datos_alumno+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";

				paginar += "<li><a href='javascript:void(0)' onclick='listar_alumnos_tesis2("+'"'+datos_alumno+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";

			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
			}

			paginar += "</ul>";
			$("#paginador_alumno_t2").html(paginar);
      
      $(".seleccionar").click(function(){
			 		$('#myModal_buscar_alumno2').modal('hide');
			    });
      
      
			}
			else{
				var nodatos = " NO HAY DATOS QUE MOSTRAR";
      	alert(nodatos);
				console.log(notados);
			}


		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR");


		}




	});



}

function seleccionar_alumno2(datos){

	var valores=datos.split("*");
	//alert(d.length);
	$("#autor_tesis3").val(valores[0]);
  $("#autor_tesis_4").val(valores[1]+" "+valores[2]+" "+valores[3]);
  //$("#autor_tesis_2").val()+$("#autor_tesis_2").val(valores[1]+" "+valores[2]+" "+valores[3]) ;
    
  //contadorr = contadorr + 1;
  /*
  if (contadorr > 0) {
    alert("vale mas de 1");
    $("#autor_tesis_3").val(valores[1]+" "+valores[2]+" "+valores[3]);
    console.log("vale:"+valores[1]+" "+valores[2]+" "+valores[3]);
  }
  */  
    
}





