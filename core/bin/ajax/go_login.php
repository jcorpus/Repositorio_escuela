<?php
require('core/bin/funciones/encriptar_pass.php');
//$_SESSION['intentos'] = 0;
if(!empty($_POST['user']) and !empty($_POST['pass'])){

    $db = new Conexion();
    $user = $db->real_escape_string($_POST['user']);
    $pass = encriptar2($_POST['pass']);
    //$sql = $db->query("SELECT id_usuario from usuarios WHERE (usuario='$user' OR email='$user') AND password='$pass' LIMIT 1 ");
    //$sql = $db->query("SELECT usuario.idUsuario,persona.Email, usuario.Usuario FROM usuario inner join persona on persona.idPersona = usuario.idPersona WHERE (usuario.Usuario='$user' OR persona.Email='$user') AND usuario.Password='$pass' LIMIT 1 ");
    $sql = $db->query("SELECT usuario.idUsuario,persona.Email, usuario.Usuario FROM usuario inner join persona on persona.idPersona = usuario.idPersona WHERE usuario.Usuario='$user'  AND usuario.Password='$pass' LIMIT 1 ");
    if($db->rows($sql)>0){
      
    //  ini_set('session_cookie_lifetime', time() + (60*60*24)); //un dia entero
      if($_POST['sesion']){
        ini_set('session.cookie_lifetime', time() + (60*60*24));
      }
      $_SESSION['app_id'] = $db->recorrer($sql)[0]; //le asigno la sesion al usuario que ingresa en la consulta de arriba.
      
    echo 1;
    }else{
      
      //$conta = $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
      //echo "el contador es: ".$conta;
        echo '<div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp; Los datos no coinciden</strong>
      </div>';
      
  
    }
    $db->liberar($sql);
  $db->close();
}else{

  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp; Debes ingresar Datos</strong>
</div>';



}








 ?>
