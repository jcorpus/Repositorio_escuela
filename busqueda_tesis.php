<?php 

require_once('core/models/model_conexion.php');
require 'core/bin/funciones/funciones_tesis.php';

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
  
    $db = new Conexion2();
    $sql = $db->query("SELECT t.FechaRegistro,t.idTesis, t.Titulo, t.Autor,tpt.idTipoTesis, tpt.DesTipoTesis FROM tesis t INNER JOIN tipotesis tpt ON tpt.idTipoTesis = t.idTipoTesis WHERE  t.Titulo  LIKE '%".$busqueda."%' OR t.Autor LIKE '%".$busqueda."%' "); 
    if ($db->rows($sql) > 0) {
      echo "<h4>Mostrando Resultados de <strong>".$busqueda."</strong></h4>";
      $valores = array();


echo '<div class="row">
  <!-- Page Content -->
  <div class="container">
    <div class="col-lg-9">
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
 