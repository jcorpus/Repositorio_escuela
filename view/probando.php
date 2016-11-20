<?php
function encriptar($cadena){
    $key='julio';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
}

function desencriptar($cadena){
     $key='julio';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

function encriptar2($cadena){
  $llave = "huhygtfrtgytghyt";
  $encriptar = base64_encode($cadena);
  return $encriptar;

}
echo "cesar encriptado es: ".encriptar2("cesar");
echo "<br>";



$encriptarr = encriptar('julioó');
echo "julio encriptadoo es: ".$encriptarr;
echo "<br>";
$hola = desencriptar('fBAI//D9uW+U7dMLS1ZcIIxGAvn/3XNCblsTBNKBiXE=');
echo "la cadena desencriptada es: ".$hola;
echo "<br>";
$var = "julio corpus";
$var2 = base64_encode($var);
echo $var2;
//http://www.datoweb.com/post/664-sistema-de-etiquetas-o-tag-cloud


/*******************************************/

///////////////////////////////////////////////
function generarCodigo($longitud, $tipo=0)
{
    //creamos la variable codigo
    $codigo = "";
    //caracteres a ser utilizados
    $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    //el maximo de caracteres a usar
    $max=strlen($caracteres)-1;
    //creamos un for para generar el codigo aleatorio utilizando parametros min y max
    for($i=0;$i < $longitud;$i++)
    {
        $codigo.=$caracteres[rand(0,$max)];
    }
    //regresamos codigo como valor
    return $codigo;
}
//mostramos el codigo con un echo
echo "<br>Código aleatorio : ".generarCodigo(10);













 ?>
