<?php

if(!empty($_POST['user']) and !empty($_POST['pass'])){

    $db = new Conexion();
    $user = $db->real_escape_string($_POST['user']);
    $pass = $_POST['pass'];
    $sql = $db->query("SELECT id_usuario from usuarios WHERE (usuario='$user' OR email='$user') AND password='$pass' LIMIT 1 ");
    if($db->rows($sql)>0){
      echo 1;
    }else{

        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>ERROR! - Los datos no coinciden</strong>
      </div>';


    }

  $db->close();
}else{

  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ERROR! Datos vacios</strong>
</div>';



}




 ?>
