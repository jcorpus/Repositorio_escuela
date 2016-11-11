<?php

if(!empty($_POST['user']) and !empty($_POST['pass'])){

    $db = new Conexion();
    $user = $db->real_escape_string($_POST['user']);
    $pass = $_POST['pass'];
    //$sql = $db->query("SELECT id_usuario from usuarios WHERE (usuario='$user' OR email='$user') AND password='$pass' LIMIT 1 ");
    $sql = $db->query("SELECT* FROM usuarios inner join persona on persona.id_persona = usuarios.id_persona WHERE (usuario='$user' OR email='$user') AND password='$pass' LIMIT 1 ");
    if($db->rows($sql)>0){

    //  ini_set('session_cookie_lifetime', time() + (60*60*24)); //un dia entero
      if($_POST['sesion']){
        ini_set('session.cookie_lifetime', time() + (60*60*24));
      }
      $_SESSION['app_id'] = $db->recorrer($sql)[0];
      echo 1;
    }else{

        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Los datos no coinciden</strong>
      </div>';


    }
    $db->liberar($sql);
  $db->close();
}else{

  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Datos vacios</strong>
</div>';



}








 ?>
