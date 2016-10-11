function goLogin(){
  //window.alert('enterr presionado');
  var connect, form, response, result;
  //httprequest
  //utilizamos un if COMPACTO
  connect = wndow.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

}

function runScriptLogin(e){
  if(e.keyCode == 13){
    goLogin();
  }
}
