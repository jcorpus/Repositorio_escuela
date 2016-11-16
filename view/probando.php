<?php
function encriptar($cadena){
    $key='julio';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    echo "la cadena es: ".$encrypted;
    return $encrypted; //Devuelve el string encriptado
}

function desencriptar($cadena){
     $key='julio';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

encriptar('julioó');
echo "<br>";
$hola = desencriptar('fBAI//D9uW+U7dMLS1ZcIIxGAvn/3XNCblsTBNKBiXE=');
echo "la cadena desencriptada es: ".$hola;
echo "<br>";
$var = "julio corpus";
$var2 = base64_encode($var);
echo $var2;
http://www.datoweb.com/post/664-sistema-de-etiquetas-o-tag-cloud
 ?>
