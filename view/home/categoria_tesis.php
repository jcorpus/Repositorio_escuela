<?php 
$db = new Conexion();
$sql = $db->query("SELECT categoria.DesCategoria FROM categoria"); 
if ($db->rows($sql) > 0) {
  $valores = array();
  while ($fila= $db->recorrer($sql)) {?>
    
    <li class="list-group-item"><a href="busqueda_tesis.php?especialidad_tesis=<?php echo $fila['DesCategoria']; ?>"><?php echo $fila['DesCategoria']; ?></a></li>
    
<?php  }
}
$db->liberar($sql);
$db->close(); ?>
