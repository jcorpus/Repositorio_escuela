<?php 

  $db = new Conexion();
  
  $id_filial =2;
  $sql = $db->query("call pa_contar_filial('$id_filial')");
  while($row = $db->recorrer($sql)) {
    echo $row['contador'];
  }
  $db->liberar($sql);
  $db->close(); 

 ?>