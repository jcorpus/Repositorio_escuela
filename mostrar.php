<?php

//require 'core/models/model_conexion.php';
require('core/core.php');
$usuarios = ver_usuarios();





if(isset($_SESSION['app_id'])){ //si no esta definida la variable session, el usuario no esta definido
  require 'core/bin/funciones/funciones_tesis.php';



  $conexion = new Conexion();

  $id_tesis =id_tesis($_GET['id']);

  if (empty($id_tesis)) {
     header('Location: home.php');
  }

  $post_tesis = obtener_datos_tesis($conexion,$id_tesis);
  if (!$post_tesis) {
    header('Location: home.php');
  }
    //print_r($post_tesis); //imprime el array de la tesisS
  $post_tesis = $post_tesis[0];


  require 'html/home/topnav.php';
  require 'html/home/header.php';

  echo '
  <script type="text/javascript">
  $(document).ready(function(){
    var resumen = $("#resumen").text();
    var num_word = 50;

    //acortar_texto();
    //segunda opcion
    $("#resumen").html(recortar_texto(resumen,num_word)+" ...");

  });


  function acortar_texto(){
    var texto = $("#resumen").text();

    texto = texto.substring(0,340);

    $("#resumen").html(texto+"...");
    console.log(texto+"...");

  }

  function recortar_texto(texto,palabras){
    var parrafo, newparrafo;
    parrafo = texto.split(/\s+/,palabras);
    newparrafo = parrafo.join(" ");
    return newparrafo;

  }




  </script>

  ';

  echo '<!-- Page Heading/Breadcrumbs -->
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Repositorio Digital de Tesis USP
                      <small>Informatica y de sistemas</small>
                  </h1>
                  <ol class="breadcrumb">
                      <li><a href="home.php">Home</a>
                      </li>
                      <li class="active">Vista Tesis</li>
                  </ol>
              </div>
          </div>';
  ////////////////////////////******************************/

  echo ' <table class="table itemDisplayTable">
     <tbody>
     <tr><td class="" style="width: 93px;">Codigo:&nbsp;</td><td class="">'.$post_tesis[1].'</td></tr>
     <tr><td class="">Titulo:&nbsp;</td><td class="">'.$post_tesis[2].'</td></tr>
     <tr><td class="">Autor:&nbsp;</td><td class="">'.$post_tesis[3].'</td></tr>
     <tr><td class="">Palabra Clave:&nbsp;</td><td class="">'.$post_tesis[4].'</td></tr>
     <tr><td class="">Fecha Registro:&nbsp;</td><td class="">'.formato_fecha($post_tesis[5]).'</td></tr>
     <tr><td class="">Citacion:&nbsp;</td><td class="">'.$post_tesis[6].'</td></tr>
     <tr><td class="">Resumen:&nbsp;</td><td class=""><p id="resumen">'.nl2br($post_tesis[7]).'</p></td></tr>
     <tr><td class="">Tipo de Tesis:&nbsp;</td><td class="">'.$post_tesis[9].'</td></tr>
     <tr><td class="">Filial:</td><td class=""><a href="busqueda_tesis.php?filial='.$post_tesis[11].'">'.$post_tesis[11].'</a><br></td></tr>
     <tr><td class="">Grado Academico:&nbsp;</td><td class="">'.$post_tesis[13].'</td></tr>
     <tr><td class="">Categoria:&nbsp;</td><td class="">'.$post_tesis[15].'</td></tr>
     </tbody>
  </table>';


  echo '<br>';
  echo ' <div class="panel panel-info"><div class="panel-heading">Datos del Archivo:</div>
   <table class="table panel-body">
  <tbody>
    <tr>
   <th id="t1" class="standard">Fichero</th>
   <th id="t2" class="standard">Descripcion </th>
   <th id="t3" class="standard">Tamaño</th>
   <th id="t4" class="standard">Formato</th>
   <th>&nbsp;</th>
  </tr>
   <tr>
     <td headers="t1" class="standard"><a target="_blank" href="'.$post_tesis[16].'">'.$post_tesis[16].'</a></td>
     <td headers="t2" class="standard">Descripcion aqui</td>
     <td headers="t3" class="standard">'.$post_tesis[18].'</td>
     <td headers="t4" class="standard">'.formato_tesis($post_tesis[17]).'</td>
     <td class="standard" align="center"><a class="btn btn-primary" target="_blank" href="'.$post_tesis[16].'">Ver/Abrir</a></td>
   </tr>
  </tbody>
  </table>
   </div>  ';

  /////contenido aqui
  /*
  echo "Codigo: ".$post_tesis[1]."<br>";
  echo "Titulo: ".$post_tesis[2]."<br>";
  echo "Autor: ".$post_tesis[3]."<br>";
  echo "Palabra Clave: ".$post_tesis[4]."<br>";
  echo "Fecha de Registro: ".formato_fecha($post_tesis[5])."<br>";
  echo "Citacion: ".$post_tesis[6]."<br>";
  echo "Resumen: ".nl2br($post_tesis[7])."<br>";
  echo "Tipo de Tesis: ".$post_tesis[9]."<br>";
  echo "Filial: ".$post_tesis[11]."<br>";
  echo "Grado academico: ".$post_tesis[13]."<br>";
  echo "Categoria: ".$post_tesis[15]."<br>";
  echo "Archivo:<a href=".$post_tesis[16].">".$post_tesis[16]."</a><br>";
  echo "Formato: ".$post_tesis[17]."<br>";
  echo "Tamaño: ".$post_tesis[18]."<br>";
  */
  require 'html/home/footer.php';






}else {

      header('Location: index.php');
    //echo '<script> window.location="index.php"; </script>';

}



 ?>
