/*
0	No inicializado (objeto creado, pero no se ha invocado el método open)
1	Cargando (objeto creado, pero no se ha invocado el método send)
2	Cargado (se ha invocado el método send, pero el servidor aún no ha respondido)
3	Interactivo (se han recibido algunos datos, aunque no se puede emplear la propiedad responseText)
4	Completo (se han recibido todos los datos de la respuesta del servidor)
*/

function __(id) {
  return document.getElementById(id);
}

function registrar_usuario(){

/*
var formElement = document.querySelector("form");
var formData = new FormData(formElement);
var request = new XMLHttpRequest();
request.open("POST", "submitform.php");
formData.append("serialnumber", serialNumber++);
request.send(formData);
*/


  var resultado, conectar, usuario, imagen;
  var formuser = new FormData($("#formulario_usuario")[0]);
  var formimagen = new FormData($("#otraforma")[0]);

  usuario = __("nombre_user").value;
  imagen = __("imagen_user").value;


  var formulario = 'nombre_user=' + usuario + '&imagen_user=' + imagen;

  conectar = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  /* se envia cada vez que se hace un cambio en ajax onreadystatechange  */
  conectar.onreadystatechange = function(){
    if(conectar.readyState == 4 && conectar.status == 200){
      if (conectar.responseText == 1) {
      resultado = '<div class="alert alert-success alert-dismissible" id="correcto">';
      resultado += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      resultado += 'Alumno Registrado Correctamente &nbsp;<i class="icon fa fa-check"></i>';
      resultado += '</div>';
      __("resp_user").innerHTML = resultado;

    }else{
      //window.location.reload(false);
    //  console.log("error aqui: "+conectar.responseText);
      document.getElementById("resp_user").innerHTML = conectar.responseText; /*aqui mostramos el error de php ejemplo contraseña incorrecta*/
    }
    }else if (conectar.readyState != 4) {

      resultado = '<div class="alert alert-warning alert-dismissible" id="correcto">';
      resultado += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      resultado += 'Enviando datos&nbsp;<i class="icon fa fa-check"></i>';
      resultado += '</div>';
      __("resp_user").innerHTML = resultado;

    }

  }
  conectar.open('POST','ajax.php?mode=reg_user',true);// method, url, async
  conectar.setRequestHeader('X-File-Name', formuser.fileName);
  conectar.setRequestHeader('X-File-Size', formuser.fileSize);
  conectar.setRequestHeader('Content-Type','multipart/form-data');
//  setRequestHeader("Content-Type", "multipart/form-data");




  conectar.send(formuser);



}
