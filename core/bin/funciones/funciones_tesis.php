<?php   


///funcion de eliminar etiquetas html
function limpiar_datos($datos){
  $datos = trim($datos);
  $datos = stripcslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
  
}


function id_tesis($id_tesis){
  return (int)limpiar_datos($id_tesis);
}



function obtener_datos_tesis($conexion,$id_tesis){
  //$resultado = $conexion->query("SELECT * FROM tesis WHERE idTesis = $id_tesis LIMIT 1 ");
    $resultado = $conexion->query("call pa_list_tesis($id_tesis)");
  //$resultado = $resultado->fetchAll();
  //return ($resultado) ? $resultado:false;
  $arreglo = array();
  
  while ($fila = $resultado->fetch_array(MYSQL_NUM)) {
    $arreglo[] = $fila;
  }
  
  //$fila = $conexion->recorrer($resultado);
  $conexion->liberar($resultado);
  $conexion->close();
  return $arreglo;

  
}

function formato_fecha($fecha_tesis){
  $fecha_registro = strtotime($fecha_tesis);
  $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  
  $dia = date('d',$fecha_registro);
  $mes = date('m',$fecha_registro)-1;
  $year = date('Y',$fecha_registro);
  
  $fecha_convertida = "$dia de " .$meses[$mes]. " del $year";
  return $fecha_convertida;
}


function solo_year($fecha_tesis2){
  
  $solo_year = strtotime($fecha_tesis2);
  $year = date('Y',$solo_year);
  return $year;
  
}



 ?>