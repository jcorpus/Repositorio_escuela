<?php 

if (true) {
  require '../model/model_tesis.php';
  $bk = new Tesis();
  $inst = $bk->detalle_p_tesis();
  echo json_encode($inst);
}else{
  echo "dato vacio";
}



 ?>