<?php
function ver_usuarios(){
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM usuarios ");
  if ($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)){
      $usuarios[$d['id_usuario']] = array(
        'id_usuario' => $d['id_usuario'],
        'usuario' => $d['usuario'],
        'email' => $d['email'],
        'permisos' => $d['permisos']
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
