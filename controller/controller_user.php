<?php

require("../model/model_user.php");
/*
	foreach ($_FILES['imagen_user'] as $clave => $valor) {
		echo "Propiedad: $clave --- Valor: $valor<br />";
	}
*/


//tendre que combinar dos arrays para la imagen y los valores del post
//http://php.net/manual/es/function.array-merge.php
$verificar =$_FILES["imagen_user"]['name'];
if (!empty($verificar)){
$valor = false;
$nombre =uniqid()."-".$_FILES['imagen_user']['name']; //archivo que subi
$tipo = $_FILES['imagen_user']['type']; // tipo de archivo
$ruta_imagen = $_FILES['imagen_user']['tmp_name']; //donde esta almacenado el archivo
$tamano = $_FILES['imagen_user']['size']; //tamaño del archivo

$dimensiones = getimagesize($ruta_imagen);
$width = $dimensiones[0];
$height = $dimensiones[1];
$limite_kb = 100;
$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

	if (!in_array($tipo,$permitidos)) {
		echo '<div class="alert alert-danger alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <i class="icon fa fa-times"></i>&nbsp;Archivo no permitido
			</div>';
			$valor = false;
		}else if($tamano > 5242880){
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <i class="icon fa fa-times"></i>&nbsp;el tamaño permitido es 5Mb
				</div>';
				$valor = false;
		}
		else if($width > 2500 || $height > 2500){
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <i class="icon fa fa-times"></i>&nbsp;La altura y anchura maxima es de 2500 px
				</div>';
				$valor = false;

		}
		else if($width < 10 || $height < 10){
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <i class="icon fa fa-times"></i>&nbsp;Error la anchura y la altura mínima permitida es 10px
				</div>';
				$valor = false;
		}
		else{
			$ruta_copia = '../html/img_server/'.$nombre;
			$ruta_registro = 'html/img_server/'.$nombre;
			move_uploaded_file($ruta_imagen,$ruta_copia);
			$valor = true;
		}

	}
	else{
	    $ruta_registro = "html/img_server/user-default.png";
	    $valor = true;
			echo "no enviaste una imagen";
	}



	/*nacimiento*/
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$year = $_POST['year'];
	$nacimiento_user= $year."/".$mes."/".$dia;

	$nombre_user = $_POST['nombre_user'];
	$dni_user = $_POST['dni_user'];
	$apep_user = $_POST['apep_user'];
	$apem_user = $_POST['apem_user'];
	$domicilio_user = $_POST['domicilio_user'];
	$telefono_user = $_POST['telefono_user'];
	$edad_user = $_POST['edad_user'];
	$email_user = $_POST['email_user'];
	$sexo_user = $_POST['sexo_user'];
	$password_user = $_POST['password_user'];






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
		//$datos_user['imagen_user'] = $ruta_registro;
		$datos_user['sexo_user'] = $_POST['sexo_user'];
		$datos_user['password_user'] = $_POST['password_user'];



	}else{
		echo "datos por GET";
	}

	return $datos_user;
}

//print_r(datos_usuario());
	///datos al modelo
	$datos_user = datos_usuario();
	$instancia = new usuario();
	$consulta = $instancia->registro_user($nombre_user,$dni_user,$apep_user,$apem_user,$domicilio_user,$telefono_user,$edad_user,
  $email_user,$sexo_user,$password_user,$nacimiento_user,$ruta_registro);

	echo $consulta;




 ?>
