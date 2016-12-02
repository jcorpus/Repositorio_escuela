<?php

if(!isset($_GET['view'])){
	$titulo = 'Iniciooo';
	$contenido_home = 'view/home/inicio.php';

}else if ($_GET['view'] == 'salir') {
	include('core/controller/salirController.php');
}
else if($_GET['view'] == 'registrar'){
	$titulo = 'Registro';
	$contenido_home = 'view/usuario/registro_usuario.php';
	#$script = 'html/javascript/image_cumple.js';
}
else if($_GET['view'] == 'view_tesis'){
	$titulo = 'Tesis';
	$contenido_home = 'view/home/tesis_view.php';
}

else{
	$titulo = 'ERROR 404';
	$contenido_home = 'html/error/error404.html';
}


 ?>
