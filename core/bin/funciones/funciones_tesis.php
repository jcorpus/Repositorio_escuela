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

  while ($fila = mysqli_fetch_array($resultado)) {
    $arreglo[] = $fila;
  }

  //$fila = $conexion->recorrer($resultado);
  $conexion->liberar($resultado);
  $conexion->close();
  return $arreglo;


}

function contador_filial($db,$id_filial){
  $resultado =$db->query("call pa_contar_filial($id_filial)");
  while ($fila = $db->recorrer($resultado)) {
    $contar = $fila['contador'];
  }
  return $contar;
  $db->liberar($resultado);
  $db->close();
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

function formato_tesis($formato_tesis){
  if ($formato_tesis === 'application/pdf') {
    $formato_tesis = 'PDF';
  }else{
    $formato_tesis = 'otro formato';
  }
  return $formato_tesis;


}


function recortar_texto($texto,$numero){

	$new_parrafo = substr(strip_tags($texto), 0, $numero);
		if (strlen(strip_tags($texto)) > $numero)
			$new_parrafo .= ' ...';
	return $new_parrafo;


}



//echo recortar_texto("holaaa como estan lol",14);

function recortar_texto2($string, $amount) {
    $str = substr($string, 0, $amount);
    if(strlen($string)>=$amount) {
        $str .= "...";
    }
    return $str;
}

$string = "Mira como cortamos esta cadena que es demasiado larga para lo que la voy a usar";

//Cadena cortada por 32 caracteres
//echo recortar_texto2($string, 32);






 ?>
