<?php 
require ('../model/model_tesis.php');
session_start();

  $usuario_mod = $_SESSION['app_id'];
  
  //echo "el usuario es: ".$usuario_mod;
  date_default_timezone_set('America/Lima');
  //echo date('H:i:s').'<br>';

  $id_tesis = $_POST['id_tesis'];
  //$id_estado_tesis = $_POST['id_estado_tesis'];
  $id_estado_tesis = '1';
  $fecha_cambio = date('Y:m:d');
  $hora_cambio = date('H:i:s');
  $estado_tesis = 'publicado';
  //echo "el id essss: ".$id_tesis;

  $instancia = new Tesis();
  $instancia->publicar_tesis($id_estado_tesis,$id_tesis,$fecha_cambio,$hora_cambio,$usuario_mod,$estado_tesis);




 ?>