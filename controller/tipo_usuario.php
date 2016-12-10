<?php 

  $db = new Conexion();
  $sql = $db->query("SELECT tipousuario.idTipoUsuario, tipousuario.DesTipoUsuario from tipousuario WHERE tipousuario.DesTipoUsuario = 'Alumno'");
  while($row = $db->recorrer($sql)) {
    echo '<option value="'.$row['idTipoUsuario'].'">'.$row['DesTipoUsuario'].'</option>';
  }
  $db->liberar($sql);
  $db->close();  
  

 ?>