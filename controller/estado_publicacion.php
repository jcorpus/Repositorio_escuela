<?php 

  $db = new Conexion();
  $sql = $db->query("SELECT * FROM estadopublicacion");
  while($row = $db->recorrer($sql)) {
    echo '<option value="'.$row['idEstadoPublicacion'].'">'.$row['DesEstadoPublicacion'].'</option>';
  }
  $db->liberar($sql);
  $db->close();  
  

 ?>