<?php 
require ('../model/model_tesis.php');
$id_tesis = $_POST['id_tesis'];
//$id_estado_tesis = $_POST['id_estado_tesis'];
$id_estado_tesis = '1';

//echo "el id essss: ".$id_tesis;

$instancia = new Tesis();
$instancia->publicar_tesis($id_estado_tesis,$id_tesis);


 ?>