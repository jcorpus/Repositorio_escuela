<?php
function ver_usuarios(){
  $db = new Conexion();
  //$sql = $db->query("SELECT * FROM usuarios");
  //$sql = $db->query("SELECT* FROM usuarios inner join persona on persona.id_persona = usuarios.id_persona ");
  $sql = $db->query("call pa_listar_usuario_todo()");
  if ($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)){
      $usuarios[$d['idUsuario']] = array(
        'idUsuario' => $d['idUsuario'],
        'idPersona' => $d['idPersona'],
        'Usuario' => $d['Usuario'],
        'Email' => $d['Email'],
        'NomPersona' => $d['NomPersona'],
        'all_apellido' => $d['ApePaterno']." ".$d['ApeMaterno'],
        'imgUsuario' => $d['imgUsuario'],
        'idTipoUsuario' => $d['idTipoUsuario'],
        'DesTipoUsuario' => $d['DesTipoUsuario'],
        'Password_user' =>$d['Password']
      );
    }
  }else{
    $usuarios = false;

  }
  $db->liberar($sql);
  $db->close();

  return $usuarios;
}

 ?>
