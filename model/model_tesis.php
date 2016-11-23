<?php

class Tesis{
private $db;
public function __construct(){
  require('../core/models/model_conexion.php');
  $this->db = new Conexion2;
  }

  function registro_tesis($nombre_tesis,$autor_tesis,$tipotesis_datos,$resumen_tesis,
  $objetivos_tesis,$filial_datos,$etiquetas_tesis,$archivo_tesis,$codigo_tesis,$tipo,$id_usuario){
    $verificar = $this->db->query("SELECT titulo FROM tesis WHERE titulo='$nombre_tesis' LIMIT 1");
    if ($this->db->rows($verificar) == 0) {
      $consulta = "INSERT INTO tesis(titulo,autor,id_tipo_tesis,resumen,objetivos,id_filial,etiquetas,tesis_archivo,codigo_tesis,formato,id_usuario)
        VALUES('$nombre_tesis','$autor_tesis','$tipotesis_datos','$resumen_tesis','$objetivos_tesis',
        '$filial_datos','$etiquetas_tesis','$archivo_tesis','$codigo_tesis','$tipo','$id_usuario')";

      if ($this->db->query($consulta)) {

          echo '<div class="alert alert-success alert-dismissible" id="correcto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Tesis registrada correctamente
            </div>';

        return 'ok';
      }else{
        return 0;
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
  $sql = "SELECT id_filial, descripcion FROM filial";
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
  $sql = "SELECT * FROM tipo_tesis";
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
if ($instancia->registro_tesis('repositorio de usp','julio corpus','1','lorem impu dolor el resumen aqui','los objetos son:','1','SI, web, php','mitesis.pdf','87757g5gg','PDF','1')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}
*/



 ?>
