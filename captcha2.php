<?php

session_start();

$image_captcha = imagecreatefrompng('site_media/img/captcha.png');
//fondo
$texto_color = imagecolorallocate($image_captcha,255,255,255);


/*
Las llaves sirven para acceder a los caracteres de la cadena como si fuera un array.
$string = 'hello';
echo $string{0}; // h
echo $string[0]; // h
*/

function generar_captcha(){
  $k = '';
  $valores = '123456789abcdefghijklmnopqrstuvwxyz';
  $maximo = strlen($valores)-1;
  for ($i=0; $i < 5 ; $i++) { 
    $k.= $valores{mt_rand(0,$maximo)};
  }
  return $k;
}

$valor_c = generar_captcha();

$_SESSION['key'] = $valor_c;
//$valor_c = rand(10000,99999);
//texo en imagen  valores: tamaño,x, y
//imagestring($image_captcha,20,20,15,$valor_c,$texto_color);

imagettftext($image_captcha, 19, 0, 34, 35, $texto_color,"site_media/fonts/VeraBd.ttf",$valor_c);

//imprimir imagen
header('Content-type: image/png');
imagepng($image_captcha);




?>
