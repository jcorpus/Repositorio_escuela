<?php
function ver_usuarios(){
  $db = new Conexion();
  //$sql = $db->query("SELECT * FROM usuarios");
  //$sql = $db->query("SELECT* FROM usuarios inner join persona on persona.id_persona = usuarios.id_persona ");
  $sql = $db->query("call pa_listar_usuario_todo()");
  if ($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)){
      $usuarios[$d['id_usuario']] = array(
        'id_usuario' => $d['id_usuario'],
        'id_persona' => $d['id_persona'],
        'usuario' => $d['usuario'],
        'email' => $d['email'],
        'nombre' => $d['nombre'],
        'ape_paterno' => $d['ape_paterno']." ".$d['ape_materno'],
        'permisos' => $d['permisos'],
        'nombre_tipo_user' => $d['nombre_tipo_user']
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
