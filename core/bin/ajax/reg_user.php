<?php

$usuario_nombre = $_POST['nombre_user'];
$usuario_imagen = $_POST['imagen_user'];
$tipo = $_FILES['imagen_user']['type'];
echo "<br>";
printf($usuario_imagen);
echo "<br>";
printf($tipo);
/*

	foreach ($_FILES['imagen_user'] as $clave => $valor) {
		echo "Propiedad: $clave --- Valor: $valor<br />";
	}

*/



 ?>
