
            <tr>
              <td headers="t1" align="left"><?php echo solo_year($fila['FechaRegistro']); ?></td>
              <td headers="t2"><a href="mostrar.php?id=<?php echo $fila['idTesis']; ?>"><?php echo $fila['Titulo']; ?></a></td>
              <td headers="t3"><?php echo $fila['Autor']; ?></td>
              <td headers="t4"><a href="?view=foros&id=<?php echo $fila['idTipoTesis']; ?>"><?php echo $fila['DesTipoTesis']; ?></a></td>
            </tr>