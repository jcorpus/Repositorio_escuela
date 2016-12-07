<?php


include "../core/models/model_conexion.php";
require ("../model/model_alumno.php");

/*nacimiento*/
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$email_alumno = trim($_POST['email_alumno']);
$dni_alumno = trim($_POST['dni_alumno']);
$nacimiento_alumno= $year."/".$mes."/".$dia;
$fecha_actual = date("Y-m-d");
$nombre_alumno = $_POST['nombre_alumno'];
$dni_alumno = $_POST['dni_alumno'];
$apep_alumno = $_POST['apep_alumno'];
$apem_alumno = $_POST['apem_alumno'];
$domicilio_alumno = $_POST['domicilio_alumno'];
$telefono_alumno = $_POST['telefono_alumno'];
$sexo_alumno = $_POST['sexo_alumno'];
$password_alumno = $_POST['codigo_alumno'];
$codigo_alumno = $_POST['codigo_alumno'];
$nombre_usuario = $_POST['codigo_alumno'];
$estado_alumno = $_POST['estado_alumno'];
$tipo_usuario = $_POST['tipousuario_datos'];



function verificar_datos($email_alumno,$dni_alumno){
	$db = new Conexion2;
	$sql = $db->query("SELECT persona.Email FROM persona WHERE persona.Email = '$email_alumno' LIMIT 1 ");

	if ($db->rows($sql) > 0) {
		echo '<div class="alert alert-danger alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;El email<strong style="color:#e8e8e8"> '.$email_alumno.' </strong>ya esta registrado...
			</div>';
		return false;
	}else{
		$sql2 = $db->query("SELECT persona.DNI FROM persona WHERE persona.DNI = '$dni_alumno' LIMIT 1 ");
		if ($db->rows($sql2) > 0) {
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;El DNI<strong style="color:#e8e8e8"> '.$dni_alumno.' </strong>ya esta registrado...
				</div>';
			return false;
		}else{
			//echo  "no repetido";
			return true;
		}

	}
	$db->liberar();
	$db->close();
}


if (verificar_datos($email_alumno,$dni_alumno)) {
	//echo "toodo correcto";
	$verificar =$_FILES["imagen_alumno"]['name'];
	if (!empty($verificar)){
	$valor = true;
	$nombre =uniqid()."-".$_FILES['imagen_alumno']['name']; //archivo que subi
	$tipo = $_FILES['imagen_alumno']['type']; // tipo de archivo
	$ruta_imagen = $_FILES['imagen_alumno']['tmp_name']; //donde esta almacenado el archivo
	$tamano = $_FILES['imagen_alumno']['size']; //tamaño del archivo

	$dimensiones = getimagesize($ruta_imagen);
	$width = $dimensiones[0];
	$height = $dimensiones[1];
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

		}else{
					
				$ruta_registro = "html/img_server/user-default.png";
				$valor = true;
				echo "no enviaste una imagen";

		}

}else{
	echo "errorrrr";
	$valor = false;
}


////envio 
if ($valor) {
	//procedemos a instanciar la clase Alumno
	$instancia = new Alumno();
	$consulta = $instancia->registro_alumno($email_alumno,$dni_alumno,$nacimiento_alumno,$fecha_actual,$nombre_alumno,$nombre_usuario,
	$apep_alumno,$apem_alumno,$domicilio_alumno,$telefono_alumno,$sexo_alumno,$password_alumno,$ruta_registro,$codigo_alumno,
	$estado_alumno,$tipo_usuario);
	echo $consulta;
}else{
	echo "ocurrio un error en el controlador";
}



	/********************ENVIAR DATOS POST CON UN ARRAY***********************/
	function datos_usuario(){
		$datos_user =  array();
		//metodo registro_user
		//clase usuario
		if ($_POST ) {
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
	/********************ENVIAR DATOS POST CON UN ARRAY***********************/

/*
function verificar_email($email_alumno){
	$db = new Conexion2;
	$sql = $db->query("SELECT persona.email FROM persona WHERE persona.email = '$email_alumno' LIMIT 1 ");
	if ($db->rows($sql) == 0) {
		//$resp = "El exmail ".$email_alumno." no existe";
		return true;
	}else{
		$verificar_email = $db->recorrer($sql)[0];
		if (strtolower($email_alumno) == strtolower($verificar_email)) {
			$resp = "el email ".$email_alumno." ya existe";
			return false;
		}else{
			echo "ocurrio un error";
			return false;
		}

	}
	$db->liberar();
	$db->close();
}
*/




 ?>
