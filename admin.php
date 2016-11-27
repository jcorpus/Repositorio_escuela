<?php
require('core/core.php');


$usuarios = ver_usuarios();
$tipo_user = $usuarios[$_SESSION['app_id']]['DesTipoUsuario'];

if ($_SESSION['app_id'] && $tipo_user == "Administrador") {
  
  require 'core/sitemap.php';
  require 'html/admin/topnav.php';
  require 'html/admin/header.php';
  require $contenido;
  
  require 'html/admin/footer.php';  
  
}else{
  
  header('Location: index.php');

}


 ?>
