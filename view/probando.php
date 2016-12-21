<?php
date_default_timezone_set('America/Lima');
 echo "hora"."<br>";
 echo date('H:i:s').'<br>';


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
function desencriptar2($cadena){
  $desencriptar = base64_decode($cadena);
  return $desencriptar;
}

echo "cesar encriptado es: ".encriptar2("123456");
echo "<br>";
echo "cesar desencriptado es: ".desencriptar2('Nzc3Njg1NDg1NA==');
echo "<br>";


$encriptarr = encriptar('julioó');
echo "julio encriptadoo es: ".$encriptarr;
echo "<br>";
$hola = desencriptar('fBAI//D9uW+U7dMLS1ZcIIxGAvn/3XNCblsTBNKBiXE=');
echo "la cadena desencriptada es: ".$hola;
echo "<br>";
//http://www.datoweb.com/post/664-sistema-de-etiquetas-o-tag-cloud


/*******************************************/

///////////////////////////////////////////////
function generarCodigo($longitud, $tipo=0){
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

echo "<br>";
echo "//*************************************//";

function calculaFecha($modo,$valor,$fecha_inicio=false){
 
   if($fecha_inicio!=false) {
          $fecha_base = strtotime($fecha_inicio);
   }else {
          $time=time();
          $fecha_actual=date("Y-m-d",$time);
          $fecha_base=strtotime($fecha_actual);
   }
 
   $calculo = strtotime("$valor $modo","$fecha_base");
 
   return date("Y-m-d", $calculo);
 
}
echo calculaFecha("years",-2,"2016-11-26");

echo "<br>";
echo "fecha actual<br>";

function fecha_actual(){
  $tiempo = time();
  $fecha_actual = date("Y-m-d", $tiempo);
  return $fecha_actual;
  
}

echo "la fecha es: ".fecha_actual();

echo "<br>";
function fecha_entredias($day_i,$month_i,$year_i,$day_f,$month_f,$year_f){
$days_in_between = (mktime(0,0,0,$month_f,$day_f,$year_f) - mktime(0,0,0,$month_i,$day_i,$year_i))/86400;
return $days_in_between;
}


//If we want to calculate the days between 21/8/2009 and 1/9/2009 then
echo fecha_entredias(21,8,2009,1,9,2009);

echo "<br>";


$hoy = date("Y-m-d");                 // March 10, 2001, 5:16 pm
echo $hoy;

echo "<br>";
$hora = date("H:i:s");
echo "la hora es: ".$hora;


/**********OTRA COSA********/
echo "<br>";
echo "otra fecha";
echo "<br>";
//setlocale(LC_TIME,"es_ES");
//echo strftime("%A %d de %B de %Y");	
// Monday 28 de November de 2016
/*
$zonahoraria = date_default_timezone_get();
echo 'Zona horaria predeterminada: ' . $zonahoraria;
*/

date_default_timezone_set('America/Lima');
echo "la fecha de lima es: ".date("Y-m-d");
echo "<br>";
$hora = date("H:i:s");
echo "la hora es: ".$hora;
echo "<br>";
echo "tranformar tamaño de archivos";
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

	
echo "el tamaño de 101500 bytes es: ".FileSizeConvert(10485760);





 ?>
