<?php 

require '../model/model_tesis.php';


switch ($_POST['dato']){
  
  case 'r_titpo_user':
  $tipo_usuario = rtrim($_POST['tipo_usuario']);
  if ($tipo_usuario == '') {
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes Ingresar un Tipo de Usuario.
      </div>';
  }else{
    $instancia = new Tesis();
    $resultado = $instancia->reg_tipo_user($tipo_usuario);
    echo $resultado;
  }
  break;
  
  case 'r_tipo_tesis':
  $tipo_tesis = rtrim($_POST['tipo_tesis']);
  if ($tipo_tesis == '') {
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes Ingresar un Tipo de Tesis.
      </div>';
  }else{
    $instancia = new Tesis();
    $resultado = $instancia->reg_tipo_tesis($tipo_tesis);
    echo $resultado;
  }
  
  break;
  
  case 'r_grado_academico':
  $grado_academico = rtrim($_POST['grado_academico_o']);
  if ($grado_academico == '') {
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes Ingresar un Grado Académico.
      </div>';
  }else{
    $instancia = new Tesis();
    $resultado = $instancia->reg_grado_academico($grado_academico);
    echo $resultado;
  }
  break;
  
  case 'r_filial':
  $filial_e = rtrim($_POST['filial_e']);
  if ($filial_e == '') {
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes Ingresar una Filial.
      </div>';
  }else{
    $instancia = new Tesis();
    $resultado = $instancia->reg_filial($filial_e);
    echo $resultado;
  }
  break;
  
  case 'r_categoria_tesis':
  $categoria_o = rtrim($_POST['categoria_o']);
  if ($categoria_o == '') {
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes Ingresar una Categoria.
      </div>';
  }else{
    $instancia = new Tesis();
    $resultado = $instancia->reg_categoria_tesis($categoria_o);
    echo $resultado;
  }
  break;
  
  default:
  break;
  
}






 ?>