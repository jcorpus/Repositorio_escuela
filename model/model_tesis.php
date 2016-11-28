<?php

class Tesis{
private $db;
public function __construct(){
  require('../core/models/model_conexion.php');
  $this->db = new Conexion2;
  }


  function verificar_datos_tesis($nombre_tesis){
  	$sql = $this->db->query("SELECT Titulo FROM tesis WHERE Titulo='$nombre_tesis' LIMIT 1");
  	if ($this->db->rows($sql) > 0) {
  		
  		return false;
  	}else{
      return true;
  	}
  	$db->liberar();
  	$db->close();
  }

  function registro_tesis($codigo_tesis ,$nombre_tesis,$autor_tesis,$pclaves,$fecha_registro,$cita_tesis,$resumen_tesis,$tipotesis_datos,
	$filial_datos,$grado_academico,$id_usuario,$categoria_tesis,$estado_tesis,$ruta_registro,$tipo,$tamano){
    $verificar = $this->db->query("SELECT Titulo FROM tesis WHERE Titulo='$nombre_tesis' LIMIT 1");
    if ($this->db->rows($verificar) == 0) {
      $consulta = "INSERT INTO tesis(CodTesis,Titulo,Autor,Palabra_Clave,FechaRegistro,Citacion,Resumen,idTipoTesis,
        idFilial,idGradoAcademico,idUsuario,idCategoria,idEstadoPublicacion,Archivo,Formato,size_tesis)
        VALUES('$codigo_tesis','$nombre_tesis','$autor_tesis','$pclaves','$fecha_registro',
        '$cita_tesis','$resumen_tesis','$tipotesis_datos','$filial_datos','$grado_academico','$id_usuario','$categoria_tesis','$estado_tesis','$ruta_registro','$tipo','$tamano')";

      if ($this->db->query($consulta)) {

          echo '<div class="alert alert-success alert-dismissible" id="">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Tesis registrada correctamente
            </div>';

        return true;
      }else{
        return false;
      }
      $this->db->liberar($verificar);
      $this->db->close();
    }else{
      $tesis_verificar = $this->db->recorrer($verificar)[0];
      if (strtolower($nombre_tesis) == strtolower($tesis_verificar)) {
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Ya hay una tesis registrada con ese Nombre
          </div>';
      }
    }
    $this->db->close();
  }


function list_repositorio(){



}

/***************lista de filial***************/
function listar_filial(){
  $sql = "SELECT idFilial, DesFilial FROM filial";
  $consulta = $this->db->query($sql);
  $arreglo = array();
  if($this->db->rows($consulta) > 0){
    while($consulta_b =$this->db->recorrer($consulta)){
      $arreglo[] = $consulta_b;
    }

  }else{
    echo "no hay datos a mostrar";
  }

  $this->db->liberar($consulta);
  $this->db->close();
  return $arreglo;
}
/***************lista de tipo de tesis***************/
function listar_tipotesis(){
  $sql = "SELECT 	idTipoTesis,DesTipoTesis FROM tipotesis";
  $consulta = $this->db->query($sql);
  $arreglo = array();
  if($this->db->rows($consulta) > 0){
    while($consulta_b =$this->db->recorrer($consulta)){
      $arreglo[] = $consulta_b;
    }

  }else{
    echo "no hay datos a mostrar";
  }

  $this->db->liberar($consulta);
  $this->db->close();
  return $arreglo;
}




}

/*
$inst = new Tesis();
$imp = $inst->listar_filial();
print_r($imp);
*/
/*

$instancia = new Tesis();
if ($instancia->registro_tesis('3434567','si web de ventas, compras y almacen','julio corpus','web, si, compras, ventas','2016-11-11','cita de tesis','el resumen qui va muchas cosas xd','1','1','1','1','1','1','html_doc_tesis/ejemplo.pdf','PDF','12345kb')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}

*/

 ?>
