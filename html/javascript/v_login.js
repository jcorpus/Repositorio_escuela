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

function go_login(){
  var conectar, form, respuesta, resultado, user, pass, sesion;
  
  user = __("user_email").value;
  pass = __("user_password").value;
  sesion = __("sesion_login").checked ? true : false; //if compacto
  form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;
  conectar = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  /* se envia cada vez que se hace un cambio en ajax onreadystatechange  */
  conectar.onreadystatechange = function(){
    if(conectar.readyState == 4 && conectar.status == 200){
      if (conectar.responseText == 1) {
      resultado =  '<div class="alert alert-dismissible alert-success">';
      resultado +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      resultado += '<strong>Conectado - </strong> Redirecionando...!<a href="#" class="alert-link"></a>';
      resultado += '</div>';
      __("ajax_login").innerHTML = resultado;
      location.href = 'home.php';  //al home



    }else{
      //window.location.reload(false);
      console.log("error aqui: "+conectar.responseText);
      document.getElementById("ajax_login").innerHTML = conectar.responseText; /*aqui mostramos el error de php ejemplo contraseña incorrecta*/
    }
    }else if (conectar.readyState != 4) {

      resultado = '<div class="alert alert-dismissible alert-warning">';
      resultado += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      resultado += '<strong>Enviando..!</strong> Espera.';
      resultado += '</div>';
      __("ajax_login").innerHTML = resultado;
      /*location.href='admin.php';*/
      //location.href = 'admin.php';
      ////window.location.reload(false); ---con esto se recarga xD
    }

  }
  conectar.open('POST','ajax.php?mode=login',true);
  conectar.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  conectar.send(form);


}



function runLogin(e){
  if (e.keyCode == 13) {
    go_login();
  }
}
