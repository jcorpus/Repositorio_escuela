<?php 

  $db = new Conexion();
  
  
  $sql = $db->query("call pa_report_tesisfilial");

  while($row = $db->recorrer($sql)) { ?>
    

    <li class="list-group-item"><span class="badge"> <?php echo $row['contador'];?> </span><a href="busqueda_tesis.php?filial=Lima"><?php echo $row['DesFilial']; ?></a></li>
  
  <?php } 
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
