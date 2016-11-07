<?php

require("../model/model_user.php");

//$usuario_nombre = $_POST['nombre_user'];

//echo "<br>";
//printf($usuario_nombre);

/*
	foreach ($_FILES['imagen_user'] as $clave => $valor) {
		echo "Propiedad: $clave --- Valor: $valor<br />";
	}
*/
function datos_usuario(){
	$datos_user =  array();
	//metodo registro_user
	//clase usuario
	if ($_POST) {

		$datos_user['nombre_user'] = $_POST['nombre_user'];
		$datos_user['dni_user'] = $_POST['dni_user'];
		$datos_user['apep_user'] = $_POST['apep_user'];
		$datos_user['apem_user'] = $_POST['apem_user'];
		$datos_user['domicilio_user'] = $_POST['domicilio_user'];
		$datos_user['telefono_user'] = $_POST['telefono_user'];
		$datos_user['edad_user'] = $_POST['edad_user'];
		$datos_user['email_user'] = $_POST['email_user'];
		$datos_user['imagen_user'] = $_POST['imagen_user'];
		$datos_user['sexo_user'] = $_POST['sexo_user'];


	}else{
		echo "datos por GET";
	}

	return $datos_user;
}

	///datos al modelo
	$datos_user = datos_usuario();
	$instancia = new usuario();
	$consulta = $instancia->registro_user(datos_usuario());





 ?>
