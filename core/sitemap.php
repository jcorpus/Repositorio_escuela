<?php

if(!isset($_GET['p'])){
	$titulo = 'Iniciooo';
	$contenido = 'view/admin/admin-home.php';
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
else if($_GET['p'] == 'reg_tesis'){
	$titulo = 'Registro tesis';
	$contenido = 'view/tesis/registro_tesis.php';
}
else if ($_GET['p'] == 'reg_alumno') {
	$titulo = 'Registro de Alumnos';
	$contenido = 'view/alumno/registro_alumno.php';
}
else if ($_GET['p'] == 'list_alumno') {
	$titulo = 'Lista de Alumnos';
	$contenido = 'view/alumno/lista_alumno.php';
}
else if ($_GET['p'] == 'reportes') {
	$titulo = 'Reportes PDF';
	$contenido = 'view/reporte-pdf/report_alumno.php';
}
else if ($_GET['p'] == 'graficos') {
	$titulo = 'Gráficos';
	$contenido = 'view/alumno/lista_alumno.php';
}
else{
	$titulo = 'ERROR 404';
	$contenido = 'html/error/error404.html';
}


 ?>
