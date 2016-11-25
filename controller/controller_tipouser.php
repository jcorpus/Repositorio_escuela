<?php


require('../model/model_user.php');
$inst = new Usuario();
$consulta = $inst->listar_tipouser();
echo json_encode($consulta);


 ?>
