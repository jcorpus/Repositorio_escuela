<?php
//creando una imagen


$imagen = imagecreate(100,45);
//fondo
$fondo = imagecolorallocate($imagen,54,154,205);
$texto = imagecolorallocate($imagen,255,255,255);
$valor_c = rand(10000,99999);
ImageFill($imagen, 50,0,$fondo);
//texo en imagen  valores: tamaño,x, y
imagestring($imagen,20,20,15,$valor_c,$texto);

//imprimir imagen
header('Content-type: image/png');
imagepng($imagen);


/*****/
function generar_captcha(){
  $k = '';
  $valores = '123456789abcdefghijklmnopqrstuvwxyz';
  $maximo = strlen($valores)-1;
  for ($i=0; $i < 5 ; $i++) { 
    $k.= $valores{mt_rand(0,$maximo)};
  }
  return $k;
}

echo generar_captcha();

?>

