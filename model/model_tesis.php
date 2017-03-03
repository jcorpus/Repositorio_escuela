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


  function Buscar_tesis_filial($_par_filial){
			
  $sql = "SELECT idTesis,Autor,Titulo  from tesis INNER JOIN filial on filial.idFilial=tesis.idFilial where filial.DesFilial='$_par_filial'";		
	$resultado = $this->db->query($sql);
  $arreglo = array();
  while ($consulta_MC = mysqli_fetch_array($resultado)) {
					$arreglo[] = $consulta_MC;
				}
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();
	}




  function registro_tesis($codigo_tesis ,$nombre_tesis,$autor_tesis,$pclaves,$fecha_registro,$cita_tesis,$resumen_tesis,$tipotesis_datos,
	$filial_datos,$grado_academico,$id_usuario,$categoria_tesis,$estado_tesis,$ruta_registro,$tipo,$tamano,$fecha_tesis){
    $verificar = $this->db->query("SELECT Titulo FROM tesis WHERE Titulo='$nombre_tesis' LIMIT 1");
    if ($this->db->rows($verificar) == 0) {
      $consulta = "INSERT INTO tesis(CodTesis,Titulo,Autor,Palabra_Clave,FechaRegistro,Citacion,Resumen,idTipoTesis,
        idFilial,idGradoAcademico,idUsuario,idCategoria,idEstadoPublicacion,Archivo,Formato,size_tesis,fecha_tesis)
        VALUES('$codigo_tesis','$nombre_tesis','$autor_tesis','$pclaves','$fecha_registro',
        '$cita_tesis','$resumen_tesis','$tipotesis_datos','$filial_datos','$grado_academico','$id_usuario','$categoria_tesis','$estado_tesis','$ruta_registro','$tipo','$tamano','$fecha_tesis')";

      if ($this->db->query($consulta)) {

          echo '<div class="alert alert-success alert-dismissible" id="">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Tesis Registrada Correctamente. 
            </div>';

        //return true;
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
    
  }



/*****************Listar tesis registradas********************/
function listar_tesis_registradas($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT t.idTesis,t.Titulo,t.Autor,t.idEstadoPublicacion, est.DesEstadoPublicacion, fl.DesFilial FROM tesis t INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion INNER JOIN filial fl ON fl.idFilial = t.idFilial
     WHERE t.idEstadoPublicacion = 2 AND (t.Titulo LIKE '%".$valor."%' OR t.Autor LIKE '%".$valor."%')  ORDER BY t.idTesis DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT t.idTesis,t.Titulo,t.Autor,t.idEstadoPublicacion, est.DesEstadoPublicacion, fl.DesFilial FROM tesis t INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion INNER JOIN filial fl ON fl.idFilial = t.idFilial
     WHERE t.idEstadoPublicacion = 2 AND  (t.Titulo LIKE '%".$valor."%' OR t.Autor LIKE '%".$valor."%')  ORDER BY t.idTesis DESC";
  }
  $resultado = $this->db->query($sql);
  $arreglo = array();
  while($re =$this->db->recorrer($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();

}

function publicar_tesis($id_estado_tesis,$id_tesis,$fecha_cambio,$hora_cambio,$usuario_mod,$estado_tesis){
	$sql = "UPDATE tesis SET idEstadoPublicacion = $id_estado_tesis WHERE idTesis = $id_tesis";
  $query_insert = "INSERT INTO detalle_public_tesis(idTesis,fecha_public_tesis,hora_cambio_estado, usuario_mod,estado_public) 
  VALUES('$id_tesis','$fecha_cambio','$hora_cambio','$usuario_mod','$estado_tesis')";
  
  if($this->db->query($sql)){
    $this->db->query($query_insert);
    echo '<div class="alert alert-success alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-check"></i>&nbsp;Tesis Publicada Correctamente.
      </div>';
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ocurrio Un ERROR.
      </div>';
  }

}

/********registro tipo user*********/

function reg_tipo_user($tipo_usuario){
  $verificar = $this->db->query("SELECT DesTipoUsuario FROM tipousuario WHERE DesTipoUsuario = '$tipo_usuario' LIMIT 1");
  $sql = "INSERT INTO tipousuario(DesTipoUsuario) VALUES('$tipo_usuario')";
  if ($this->db->rows($verificar) == 0) {
    if ($this->db->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>&nbsp;Tipo Usuario registrado Correctamente.
        </div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;Ocurrió un Error
        </div>';
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ya existe un Tipo de Usuario: <strong>'.$tipo_usuario.'</strong>
      </div>';
  }
  $this->db->liberar($verificar,$sql);
  $this->db->close();
}

function reg_tipo_tesis($tipo_tesis){
  $verificar = $this->db->query("SELECT DesTipoTesis FROM tipotesis WHERE DesTipoTesis = '$tipo_tesis' LIMIT 1");
  $sql = "INSERT INTO tipotesis(DesTipoTesis) VALUES('$tipo_tesis')";
  if ($this->db->rows($verificar) == 0) {
    if ($this->db->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>&nbsp;Tipo Tesis registrado Correctamente.
        </div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;Ocurrió un Error
        </div>';
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ya existe un Tipo de Tesis: <strong>'.$tipo_tesis.'</strong>
      </div>';
  }
  $this->db->liberar($verificar,$sql);
  $this->db->close();
}

/*****grado academico ****/

function reg_grado_academico($grado_academico){
  $verificar = $this->db->query("SELECT DesGradoAcademico FROM gradoacademico WHERE DesGradoAcademico = '$grado_academico' LIMIT 1");
  $sql = "INSERT INTO gradoacademico(DesGradoAcademico) VALUES('$grado_academico')";
  if ($this->db->rows($verificar) == 0) {
    if ($this->db->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>&nbsp;Grado Académico registrado Correctamente.
        </div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;Ocurrió un Error
        </div>';
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ya existe un Grado Académico: <strong>'.$grado_academico.'</strong>
      </div>';
  }
  $this->db->liberar($verificar,$sql);
  $this->db->close();
}

/*****filial tesis******/
function reg_filial($filial_e){
  $verificar = $this->db->query("SELECT DesFilial FROM filial WHERE DesFilial = '$filial_e' LIMIT 1");
  $sql = "INSERT INTO filial(DesFilial) VALUES('$filial_e')";
  if ($this->db->rows($verificar) == 0) {
    if ($this->db->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>&nbsp;Filial registrada Correctamente.
        </div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;Ocurrió un Error
        </div>';
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ya existe una Filial: <strong>'.$filial_e.'</strong>
      </div>';
  }
  $this->db->liberar($verificar,$sql);
  $this->db->close();
}

/*****categoria tesis******/
function reg_categoria_tesis($categoria_o){
  $verificar = $this->db->query("SELECT DesCategoria FROM categoria WHERE DesCategoria = '$categoria_o' LIMIT 1");
  $sql = "INSERT INTO categoria(DesCategoria) VALUES('$categoria_o')";
  if ($this->db->rows($verificar) == 0) {
    if ($this->db->query($sql)) {
      echo '<div class="alert alert-success alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>&nbsp;Categoria registrada Correctamente.
        </div>';
    }else{
      echo '<div class="alert alert-danger alert-dismissible" id="">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-times"></i>&nbsp;Ocurrió un Error
        </div>';
    }
  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Ya existe una Categoria: <strong>'.$categoria_o.'</strong>
      </div>';
  }
  $this->db->liberar($verificar,$sql);
  $this->db->close();
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

/***************detalle de publicacion de tesis***************/

function detalle_p_tesis(){
  $query = $this->db->query("SELECT dt.id_detalle_public_tesis,t.Titulo,dt.fecha_public_tesis,dt.hora_cambio_estado,dt.usuario_mod,dt.estado_public FROM detalle_public_tesis dt INNER JOIN tesis t ON dt.idTesis = t.idTesis");
  $arreglo = array();
  while ($result = $this->db->recorrer($query)) {
    $arreglo[] = $result;
  }
  return $arreglo;
  
}







}


/*
$instancia = new Tesis();
if ($instancia->reg_tipo_tesis('julooio')) {
  echo "correcto";
}else{
  echo "error";
}
*/


/*
$inst = new Tesis();
$imp = $inst->listar_tesis_registradas('julio');
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
