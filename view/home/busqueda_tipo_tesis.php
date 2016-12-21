<tr>
  <td headers="t1" align="left"><?php echo solo_year($fila['FechaRegistro']); ?></td>
  <td headers="t2"><a href="mostrar.php?id=<?php echo $fila['idTesis'];?>&codigo=<?php echo $fila['CodTesis']; ?>"><?php echo $fila['Titulo']; ?></a></td>
  <td headers="t3"><?php echo $fila['Autor']; ?></td>
  <td headers="t4"><a href="busqueda_tesis.php?especialidad_tesis=<?php echo $fila['DesCategoria']; ?>"><?php echo $fila['DesCategoria']; ?></a></td>
  <td headers="t5"><a href="busqueda_tesis.php?filial=<?php echo $fila['DesFilial']; ?>"><?php echo $fila['DesFilial']; ?></a></td>
</tr>