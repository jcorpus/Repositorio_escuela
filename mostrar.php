<?php 
require 'core/bin/funciones/funciones_tesis.php';
require 'core/models/model_conexion.php';

$conexion = new Conexion2();

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
echo '<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
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
////////////////////////////******************************/

echo ' <table class="table itemDisplayTable">
   <tbody>
   <tr><td class="">Codigo:&nbsp;</td><td class="">'.$post_tesis[1].'</td></tr>
   <tr><td class="">Titulo:&nbsp;</td><td class="">'.$post_tesis[2].'</td></tr>
   <tr><td class="">Autor:&nbsp;</td><td class="">'.$post_tesis[3].'</td></tr>
   <tr><td class="">Palabra Clave:&nbsp;</td><td class="">'.$post_tesis[4].'</td></tr>
   <tr><td class="">Fecha Registro:&nbsp;</td><td class="">'.formato_fecha($post_tesis[5]).'</td></tr>
   <tr><td class="">Citacion:&nbsp;</td><td class="">'.$post_tesis[6].'</td></tr>
   <tr><td class="">Resumen:&nbsp;</td><td class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td></tr>
   <tr><td class="">Tipo de Tesis:&nbsp;</td><td class="">'.$post_tesis[9].'</td></tr>
   <tr><td class="">Filial:</td><td class=""><a href="'.$post_tesis[10].'">'.$post_tesis[11].'</a><br></td></tr>
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
   <td headers="t4" class="standard">'.$post_tesis[17].'</td>
   <td class="standard" align="center"><a class="btn btn-primary" target="_blank" href="'.$post_tesis[16].'">Ver/Abrir</a></td>
 </tr>
</tbody>
</table>
 </div>  ';

/////contenido aqui
echo "Codigo: ".$post_tesis[1]."<br>";
echo "Titulo: ".$post_tesis[2]."<br>";
echo "Autor: ".$post_tesis[3]."<br>";
echo "Palabra Clave: ".$post_tesis[4]."<br>";
echo "Fecha de Registro: ".formato_fecha($post_tesis[5])."<br>";
echo "Citacion: ".$post_tesis[6]."<br>";
echo "Resumen: ".$post_tesis[7]."<br>";
echo "Tipo de Tesis: ".$post_tesis[9]."<br>";
echo "Filial: ".$post_tesis[11]."<br>";
echo "Grado academico: ".$post_tesis[13]."<br>";
echo "Categoria: ".$post_tesis[15]."<br>";
echo "Archivo:<a href=".$post_tesis[16].">".$post_tesis[16]."</a><br>";
echo "Formato: ".$post_tesis[17]."<br>";
echo "Tamaño: ".$post_tesis[18]."<br>";

require 'html/home/footer.php';


 ?>