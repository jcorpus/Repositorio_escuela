<?php 
require ('../model/model_tesis.php');

$boton = $_POST['boton'];
if($boton==='buscar'){
  $inicio = 0;
  $limite = 5;
  if(isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    $inicio = ($pagina -1) * $limite;
  }
  $valor = $_POST['valor'];
  $instancia = new Tesis();
  $a = $instancia->listar_tesis_registradas($valor);
  $b = count($a);
  $c = $instancia->listar_tesis_registradas($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}

?>