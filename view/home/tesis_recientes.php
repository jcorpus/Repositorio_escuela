<?php 
$db = new Conexion();
$sql = $db->query("SELECT t.FechaRegistro,t.idTesis, t.Titulo, t.Autor,t.CodTesis,tpt.idTipoTesis, tpt.DesTipoTesis,fl.idFilial,fl.DesFilial,est.idEstadoPublicacion, est.DesEstadoPublicacion,ct.idCategoria, ct.DesCategoria FROM tesis t INNER JOIN tipotesis tpt ON tpt.idTipoTesis = t.idTipoTesis INNER JOIN categoria ct ON t.idCategoria = ct.idCategoria INNER JOIN filial fl ON t.idFilial = fl.idFilial INNER JOIN estadopublicacion est ON est.idEstadoPublicacion = t.idEstadoPublicacion WHERE t.idEstadoPublicacion = 1 ORDER BY t.idTesis DESC LIMIT 10"); 
if ($db->rows($sql) > 0) {
  $valores = array();
  while ($fila= $db->recorrer($sql)) {?>
    <tr>
      <td headers="t1" align="left"><?php echo solo_year($fila['FechaRegistro']); ?></td>
      <td headers="t2"><a href="mostrar.php?id=<?php echo $fila['idTesis'];?>&codigo=<?php echo $fila['CodTesis']; ?>"><?php echo $fila['Titulo']; ?></a></td>
      <td headers="t3"><?php echo $fila['Autor']; ?></td>
      <td headers="t4"><a href="busqueda_tesis.php?especialidad_tesis=<?php echo $fila['DesCategoria']; ?>"><?php echo $fila['DesCategoria']; ?></a></td>
      <td headers="t5"><a href="busqueda_tesis.php?filial=<?php echo $fila['DesFilial']; ?>"><?php echo $fila['DesFilial']; ?></a></td>
    </tr>

<?php  }
}
$db->liberar($sql);
$db->close(); ?>