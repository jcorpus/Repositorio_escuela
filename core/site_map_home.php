<?php

if(!isset($_GET['view'])){
	$titulo = 'Iniciooo';
	$contenido_home = 'view/home/inicio.php';

}else if ($_GET['view'] == 'salir') {
	include('core/controller/salirController.php');
}
else if($_GET['view'] == 'perfil'){
	$titulo = 'Perfil';
	$contenido_home = 'view/home/perfil_user.php';
}
else if($_GET['view'] == 'faq'){
	$titulo = 'FAQ';
	$contenido_home = 'view/home/faq.php';
}

else{
	$titulo = 'ERROR 404';
	$contenido_home = 'html/error/error404.html';
}



 ?>
