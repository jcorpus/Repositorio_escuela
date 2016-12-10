<?php 

function encriptar2($cadena){
  $llave = "huhygtfrtgytghyt";
  $encriptar = base64_encode($cadena);
  return $encriptar;
}
function desencriptar2($cadena){
  $encriptar = base64_decode($cadena);
  return $encriptar;
}


 ?>