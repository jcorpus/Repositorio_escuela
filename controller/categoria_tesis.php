<?php 

  $db = new Conexion();
  $sql = $db->query("SELECT * FROM categoria ");
  while($row = $db->recorrer($sql)) {
    echo '<option value="'.$row['idCategoria'].'">'.$row['DesCategoria'].'</option>';
  }
  $db->liberar($sql);
  $db->close();  
  

 ?>