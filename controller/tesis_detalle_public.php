<?php

require ('../model/model_tesis.php');

$MC = new  Tesis();
$consulta = $MC->Buscar_tesis_filial($recibir_dato);
echo json_encode($consulta)	;	
		
?>