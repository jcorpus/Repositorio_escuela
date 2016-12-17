<?php 

//include "../core/models/model_conexion.php";
require ("../model/model_user.php");
require("../core/bin/funciones/encriptar_pass.php");
session_start();
$id_user_perfil = $_SESSION['app_id'];
$password_user2 = trim($_POST['password_userp']);
$password_user = encriptar2($password_user2);
//echo "el valo res: ".$email_user." y el id es: ".$id_user_perfil;


  
  if (!empty($password_user)) {
    $objeto = new Usuario();
    $objeto->mod_user_perfil($password_user,$id_user_perfil);

  }else{
    echo '<div class="alert alert-danger alert-dismissible" id="">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una Contraseña
      </div>';
  }
  
  


/*
$instancia = new Alumno();
$consulta = $instancia->registro_alumno();
echo $consulta;
*/


 ?>