<?php 
require ('../model/model_tesis.php');

date_default_timezone_set('America/Lima');
 echo date('H:i:s').'<br>';

$id_tesis = $_POST['id_tesis'];
//$id_estado_tesis = $_POST['id_estado_tesis'];
$id_estado_tesis = '1';
$fecha_cambio = date('Y:m:d');
$hora_cambio = date('H:i:s');
//echo "el id essss: ".$id_tesis;

$instancia = new Tesis();
$instancia->publicar_tesis($id_estado_tesis,$id_tesis);


 ?>