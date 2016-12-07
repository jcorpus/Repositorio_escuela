<?php 

//require_once('core/models/model_conexion.php');
  require('core/core.php');
  $usuarios = ver_usuarios();
require 'core/bin/funciones/funciones_tesis.php';
//$conexion = new Conexion2();
//$usuarios = ver_usuarios2($conexion);

require 'html/home/topnav.php';
require 'html/home/header.php';
//require $contenido_home;



echo '<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">Repositorio Digital de Tesis USP
                    <small>Informatica y de sistemas</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Blog Home One</li>
                </ol>
            </div>
        </div>';



if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    $busqueda = limpiar_datos($_GET['busqueda']);
  
    $db = new Conexion();
    $sql = $db->query("SELECT t.FechaRegistro,t.idTesis, t.Titulo, t.Autor,tpt.idTipoTesis, tpt.DesTipoTesis FROM tesis t INNER JOIN tipotesis tpt ON tpt.idTipoTesis = t.idTipoTesis WHERE  t.Titulo  LIKE '%".$busqueda."%' OR t.Autor LIKE '%".$busqueda."%' "); 
    if ($db->rows($sql) > 0) {
      echo "<h4>Mostrando Resultados de <strong>".$busqueda."</strong></h4>";
      $valores = array();


echo '<div class="row">
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
            </tr>
            ';




      while ($fila= $db->recorrer($sql)) {
        $valores[] = $fila;
        //print_r ($fila);
      require 'view/home/busqueda_view.php';  
      }
      
      echo '            
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-3">

                    <!-- Blog Search Well -->
                    <div class="well">
                        <h4>Buscar</h4>
                        <div class="" id="respuesta_tesis">
                        </div>
                        <div class="">
                          <form action="busqueda_tesis.php" method="GET" class="sidebar-form"><!-- busqueda_tesis.php -->
                            <div class="input-group">
                              <input type="text" name="busqueda" id="busqueda_tesis" class="form-control" placeholder="Buscar...">
                                  <span class="input-group-btn">
                                    <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                  </span>
                            </div>
                          </form>  
                        </div>
                        <!-- /.input-group -->
                    </div>

                    <!-- Blog Categories Well -->
                    <div class="well">
                        <h4>Categorias</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li><a href="?view=ejemplo">ejemplo vista</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-6">
                                <ul class="list-unstyled">
                                    <li><a href="#">Category Name</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                    <li><a href="#">Category Name</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <!-- Side Widget Well -->
                    <div class="well">
                        <h4>Side Widget Well</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                    </div>

                </div>
        </div>
        <!-- /.container -->  
      </div>';
      
  
      
      
    }else{
      echo 'No se encontraron datos con '.$busqueda.' ';
    }

}else{
  header('Location: home.php');
  
}
require 'html/home/footer.php';


 ?>

 