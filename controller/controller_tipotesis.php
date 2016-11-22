<?php
require('../model/model_tesis.php');
$inst = new Tesis();
$consulta = $inst->listar_tipotesis();
echo json_encode($consulta);


 ?>
