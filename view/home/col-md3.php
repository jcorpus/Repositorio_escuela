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
              <?php require('controller/contar_filial.php'); ?>
            </ul>
          </div>
          <!--Filiales-->
          <!--otros repositorios-->
          <div id="" class="panel panel-default">
          <div class="panel-heading"><h5>Otros Repositorios</h5></div>
            <ul class="list-group">
              <li class="list-group-item"><a href="http://tesis.pucp.edu.pe/" target="_blank">PUCP</a></li>
              <li class="list-group-item"><a href="http://repositorioacademico.upc.edu.pe/upc/" target="_blank">UPC</a></li>
              <li class="list-group-item"><a href="http://repositorio.up.edu.pe/" target="_blank">Universidad del Pacifico</a></li>
              <li class="list-group-item"><a href="https://pirhua.udep.edu.pe/" target="_blank">Universidad de Piura</a></li>
              <li class="list-group-item"><a href="http://repositorio.esan.edu.pe/handle/esan/1" target="_blank">Universidad ESAN</a></li>
              
            </ul>
          </div>
      </div>