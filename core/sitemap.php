<?php

if(!isset($_GET['p'])){
	$titulo = 'Iniciooo';
	$contenido = 'html/admin/admin.php';

}
else if($_GET['p'] == 'registrar'){
	$titulo = 'Registro';
	$contenido = 'view/usuario/registro_usuario.php';
	#$script = 'html/javascript/image_cumple.js';
}
else if($_GET['p'] == 'listar'){
	$titulo = 'Listar';
	$contenido = 'view/usuario/lista_usuario.php';
}
else{
	$titulo = 'ERROR 404';
	$contenido = 'html/error/error404.html';
}


 ?>
