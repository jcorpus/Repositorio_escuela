
function buscar_user(){
	var bus = $("#buscar_usuario").val();
	listar_usuarios(bus,'1');

}


function listar_usuarios(valor,pagina){
	//valor = valor que el usuario escribe para mostrar los datos por apellido o nombre
	var pagina = Number(pagina);
	$.ajax({
		url:'controller/controller_list_user.php',
		type: 'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
		beforeSend: function(){
			//<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			//alert("enviando");
			$("#loading_user").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
			//$("#cargando").show();

		},
    complete: function(){
      $("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
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
			cadena += "<th>#</th>";
			cadena += "<th>Nombres</th>";
			cadena += "<th>Ape P</th>";
			cadena += "<th>Ape M</th>";
			cadena += "<th>DNI</th>";
			cadena += "<th>Email</th>";
			cadena += "<th>Telefono</th>";
			cadena += "<th>Sexo</th>";
			cadena += "<th>Edad</th>";
			cadena += "<th>Clave</th>";
			cadena += "<th>Fecha R.</th>";
			cadena += "<th>Acción</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				datos_array =valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5]+"*"+valores[i][6]+"*"+valores[i][7]+"*"+valores[i][8]+"*"+valores[i][9]+"*"+valores[i][10]+"*"+valores[i][11]+"*"+valores[i][12]+"*"+valores[i][13];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][1]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
				cadena += "<td>"+valores[i][4]+"</td>";
				cadena += "<td>"+valores[i][7]+"</td>";
				cadena += "<td>"+valores[i][6]+"</td>";
				cadena += "<td>"+valores[i][8]+"</td>";
				cadena += "<td>"+valores[i][10]+"</td>";
				cadena += "<td>"+valores[i][11]+"</td>";
				cadena += "<td>"+valores[i][12]+"</td>";
				cadena += "<td><div class='btn-group'> <button type='button' class='btn btn-success ' data-toggle='dropdown' aria-expanded='false'>Acción <span class='glyphicon glyphicon-cog'></span></button> <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'> <span class='caret'></span></button> <ul class='dropdown-menu' role='menu'> <li><a href='#' data-toggle='modal' data-target='#myModal_modificar' onclick='mostrar_usuario("+'"'+datos_array+'"'+");'>Modificar</a></li> <li class='divider'></li> <li><a href='#' data-toggle='modal' data-target='#myModal_eliminar'  onclick='eliminar_alumno("+'"'+datos_array+'"'+");' >Eliminar</a></li> </ul> </div></td>";
				cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar").html(cadena);

			var totaldatos = datos[1];
			//alert("total de datos"+totaldatos);
			var numero_paginas = Math.ceil(totaldatos/5); //el Math.ceil acerca el resultado al próximo entero
			//alert("total de paginas"+numero_paginas);
			var buscar_alumno = $("#buscar_alumno").val();


			var paginar = "<ul class='pagination'>";
			if(pagina>1){

				//entidad html «  equivale a = &laquo
				//entidad html ‹  equivale a = &lsaquo
				//entidad html ›  equivale a = &rsaquo
				//entidad html »  equivale a = &raquo

				paginar += "<li><a href='javascript:void(0)' onclick='listar_usuarios("+'"'+buscar_alumno+'","'+1+'"'+")'>&laquo;</a></li>";
				paginar += "<li><a href='javascript:void(0)' onclick='listar_usuarios("+'"'+buscar_alumno+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";



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
					paginar += "<li><a href='javascript:void(0)' onclick='listar_usuarios("+'"'+buscar_alumno+'","'+i+'"'+")'>"+i+"</a></li>";
				}


			}

			if(pagina < numero_paginas){

				paginar += "<li><a href='javascript:void(0)' onclick='listar_usuarios("+'"'+buscar_alumno+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";

				paginar += "<li><a href='javascript:void(0)' onclick='listar_usuarios("+'"'+buscar_alumno+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";

			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
			}

			paginar += "</ul>";
			$("#paginador_usuarios").html(paginar);

			//http://codepen.io/Manoz/pen/pydxK

			}
			else{
				var nodatos = " NO HAY DATOS QUE MOSTRAR";
        $("#nodatos").html(nodatos);
      	alert(nodatos);
				console.log(notados);

			}


		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR");


		}




	});



}







function eliminar_usuario(datos){
	var valores=datos.split("*");
	var id_cliente2 = valores[0];
	$("#idusuario").val(valores[0]);
	$("#eusuario").text(valores[1]+" "+valores[2]);
	//alert("el id de la fila es:"+id_cliente2);
	//data:'email='+email+'&password='+password+"&boton=ingresar"
	/*
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_eliminar">Eliminar cliente</button>
	*/

	/*
	//onclick="load_div('contenido','Views/clientes.php')"
	*/

}

//"+'"'+valores[i][0]+'"'+"

//Controller/controller_eliminar_cliente.php'

function mostrar_usuario(datos){

	var valores=datos.split("*");
	//alert(d.length);
	$("#id_alumno2").val(valores[0]);
	$("#nombre_alumno2").val(valores[1]);
	$("#ape_paterno2").val(valores[2]);
	$("#ape_materno2").val(valores[3]);
	$("#dni_alumno2").val(valores[4]);
	$("#domicilio_alumno2").val(valores[5]);
	$("#telefono_alumno2").val(valores[6]);
	$("#email_alumno2").val(valores[7]);
	$("#codigo_alumno2").val(valores[11]);
  	//document.getElementById('preview_image').src = valores[13];
  	//$("#imagen").attr("src","http://i.imgur.com/nTfaQnw.png");
  $("#preview_image").attr("src",valores[13]);
  $("#image_oculta").val(valores[13]);

  $("#id_persona2").val(valores[10]);
  	//document.getElementById("year2").selectedIndex = 2; //2016-08-15
  	var sexo2 = valores[8];
	if(sexo2==='F'){
	  document.getElementById('femenino2').checked = true;
	}
	else{
	  document.getElementById('masculino2').checked = true;
	}
  	//$("radio[name=sexo_alumno2]").attr("checked",true);

  	//document.getElementsByClassName('sexo_alumno2').checked = true;

}

//****************IMAGEN PREVIEW**************/
 $('.file-input').on('change', function() {
    previewImage(this);
});



 $(document).ready(function(){
    listar_usuarios('','1');
    $(".oculto").hide();

  });
