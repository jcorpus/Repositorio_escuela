<?php 

  $db = new Conexion();
  
  $id_filial = 1;
  $sql = $db->query("call pa_contar_filial('$id_filial')");
  while($row = $db->recorrer($sql)) {
    echo $row['contador'];
  }
  $db->liberar($sql);
  $db->close();  
  
  /*
  function contar_filial($id_filial_contar){
    $sql = $db->query("call pa_contar_filial('$id_filial_contar')");
    while($row = $db->recorrer($sql)) {
      $valorr =  $row['contador'];
    }
    return $valorr;
    $db->liberar($sql);
    $db->close();    
    
  }
  */

 ?>
 