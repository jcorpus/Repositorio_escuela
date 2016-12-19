<?php 
$db = new Conexion();
$sql = $db->query("SELECT t.FechaRegistro,t.idTesis, t.Titulo, t.Resumen, t.Autor,t.CodTesis,tpt.idTipoTesis, tpt.DesTipoTesis,fl.idFilial,fl.DesFilial,est.idEstadoPublicacion, est.DesEstadoPublicacion,ct.idCategoria, ct.DesCategoria FROM tesis t INNER JOIN tipotesis tpt ON tpt.idTipoTesis = t.idTipoTesis INNER JOIN categoria ct ON t.idCategoria = ct.idCategoria INNER JOIN filial fl ON t.idFilial = fl.idFilial INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion WHERE t.idEstadoPublicacion = 1 ORDER BY t.idTesis DESC LIMIT 10"); 
if ($db->rows($sql) > 0) {
  $valores = array();
  while ($fila= $db->recorrer($sql)) {?>
    <li>
      <h4>
          <a href="mostrar.php?id=<?php echo $fila['idTesis'];?>&codigo=<?php echo $fila['CodTesis']; ?>"><?php echo $fila['Titulo']; ?></a>
      </h4>
      <p><strong clas=""><?php echo $fila['Autor']; ?></strong><span> <?php echo $fila['DesFilial']; ?></span> <span><?php echo formato_fecha($fila['FechaRegistro']); ?></span></p>
      <p><?php echo $fila['Resumen'] ?></p>
    </li>

<?php  }
}
$db->liberar($sql);
$db->close(); ?>


  

