
<?php


  require('core/core.php');
  //session_start();
#obtener toda la info del usuario, nombre, email, etc
  //require('core/bin/funciones/get_users.php');

$usuarios = ver_usuarios();
  if(isset($_SESSION['app_id'])){ //si no esta definida la variable session, el usuario no esta definido

    require 'core/site_map_home.php';
    require 'html/home/topnav.php';
    require 'html/home/header.php';
    require $contenido_home;
    require 'html/home/footer.php';
  }else {

        header('Location: index.php');
      //echo '<script> window.location="index.php"; </script>';

  }







 ?>
