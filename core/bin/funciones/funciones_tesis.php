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

function ver_usuarios2($conexion){

  //$sql = $db->query("SELECT * FROM usuarios");
  //$sql = $db->query("SELECT* FROM usuarios inner join persona on persona.id_persona = usuarios.id_persona ");
  $sql = $conexion->query("call pa_listar_usuario_todo()");
  if ($conexion->rows($sql) > 0) {
    while($d = $conexion->recorrer($sql)){
      $usuarios[$d['idUsuario']] = array(
        'idUsuario' => $d['idUsuario'],
        'idPersona' => $d['idPersona'],
        'Usuario' => $d['Usuario'],
        'Email' => $d['Email'],
        'NomPersona' => $d['NomPersona'],
        'all_apellido' => $d['ApePaterno']." ".$d['ApeMaterno'],
        'imgUsuario' => $d['imgUsuario'],
        'idTipoUsuario' => $d['idTipoUsuario'],
        'DesTipoUsuario' => $d['DesTipoUsuario']
      );
    }
  }else{
    $usuarios = false;
  }
  $conexion->liberar($sql);
  $conexion->close();

  return $usuarios;
}




/*

$resultado = $this->db->query($sql);
  $arreglo = array();
  while($re =$resultado->fetch_array(MYSQL_NUM)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;

*/













 ?>