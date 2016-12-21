<div class="row">
  <!-- Page Content -->
  <div class="container">
    <div class="col-md-9">
      <div class="panel panel-info">
        <div class="panel-heading">Resultados:</div>
        <table align="center" class="table">
          <tbody>
            <tr>
              <th id="t1">Fecha:</th>
              <th id="t2">Titulo</th>
              <th id="t3">Autor</th>
              <th id="t4">Tipo</th>
              <th id="t4">Filiall</th>
            </tr>
            


<?php 
while ($fila= $db->recorrer($sql)) { 
  $valores[] = $fila;?>
  <tr>
    <td headers="t1" align="left"><?php echo solo_year($fila['FechaRegistro']); ?></td>
    <td headers="t2"><a href="mostrar.php?id=<?php echo $fila['idTesis'];?>&codigo=<?php echo $fila['CodTesis']; ?>"><?php echo $fila['Titulo']; ?></a></td>
    <td headers="t3"><?php echo $fila['Autor']; ?></td>
    <td headers="t4"><a href="busqueda_tesis.php?tipo_tesis=<?php echo $fila['DesTipoTesis']; ?>"><?php echo $fila['DesTipoTesis']; ?></a></td>
    <td><a href="busqueda_tesis.php?filial=<?php echo $fila['DesFilial']; ?>"><?php echo $fila['DesFilial']; ?></a></td>
  </tr> 
<?php } ?>



                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-3">

                    <!-- Blog Search Well -->
                  
                  <div id="" class="panel panel-default">
                    <div class="panel-heading"><h4>Buscar</h4>
                      <form action="busqueda_tesis.php" method="GET" class="sidebar-form"><!-- busqueda_tesis.php -->
                          <div class="input-group">
                              <input type="text" name="busqueda" id="busqueda_tesis" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                </span>
                          </div>
                      </form>  
                    </div>                      
                  </div>
                      
                    <!--otra categoria-->
                    <div id="" class="panel panel-default">
                    <div class="panel-heading"><h5>Categorias</h5></div>
                      <ul class="list-group">
                        <?php require('view/home/categoria_tesis.php'); ?>
                      </ul>
                    </div>
                    <!--otra categoria-->
                    <!--Filiales-->
                    <div id="" class="panel panel-default">
                    <div class="panel-heading"><h5>Filiales</h5></div>
                    <ul class="list-group">
                      <li class="list-group-item"><span class="badge"><?php require('controller/contar_filial.php'); ?></span><a href="busqueda_tesis.php?filial=Chimbote">Chimbote</a></li>
                      <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_huaraz.php'); ?></span><a href="busqueda_tesis.php?filial=Huaraz">Huaraz </a></li>
                      <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_lima.php'); ?></span><a href="busqueda_tesis.php?filial=Lima">Lima</a></li>
                      <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_huacho.php'); ?></span><a href="busqueda_tesis.php?filial=Huacho">Huacho</a></li>
                    </ul>
                    </div>
                    <!--Filiales-->
                    <!-- Side Widget Well -->
                    <div class="well">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>

                </div>
        </div>
        <!-- /.container -->  
</div>