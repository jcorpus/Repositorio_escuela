<?php
require('../model/model_tesis.php');
$inst = new Tesis();
$consulta = $inst->listar_filial();
echo json_encode($consulta);


 ?>
