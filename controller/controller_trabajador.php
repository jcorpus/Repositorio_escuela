<?php 

include "../core/models/model_conexion.php";
require ("../model/model_trabajador.php");
require ("../core/bin/funciones/encriptar_pass.php");

/*nacimiento*/
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$year = $_POST['year'];

$email_trabajador = trim($_POST['email_trabajador']);
$dni_trabajador = trim($_POST['dni_trabajador']);
$nacimiento_trabajador= $year."/".$mes."/".$dia;
$fecha_actual = date("Y-m-d");
$nombre_trabajador = $_POST['nombre_trabajador'];
$dni_trabajador = $_POST['dni_trabajador'];
$apep_trabajador = $_POST['apep_trabajador'];
$apem_trabajador = $_POST['apem_trabajador'];
$domicilio_trabajador = $_POST['domicilio_trabajador'];
$telefono_trabajador = $_POST['telefono_trabajador'];
$sexo_trabajador = $_POST['sexo_trabajador'];
$password_trabajador = encriptar2($_POST['codigo_trabajador']);
$codigo_trabajador = $_POST['codigo_trabajador'];
$nombre_usuario = $_POST['codigo_trabajador'];
$estado_trabajador = $_POST['estado_trabajador'];
$tipo_usuario = $_POST['tipousuario_datos'];



function verificar_datos($email_trabajador,$dni_trabajador,$codigo_trabajador){
	$db = new Conexion2;
	$sql = $db->query("SELECT persona.Email FROM persona WHERE persona.Email = '$email_trabajador' LIMIT 1 ");
	$sql3 = $db->query("SELECT tr.UspCodTra FROM trabajador tr WHERE tr.UspCodTra = '$codigo_trabajador' LIMIT 1 ");
	if ($db->rows($sql) > 0) {
		echo '<div class="alert alert-danger alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;El email<strong style="color:#e8e8e8"> '.$email_trabajador.' </strong>ya esta registrado...
			</div>';
		return false;
	}else if($db->rows($sql3) > 0){
    echo '<div class="alert alert-danger alert-dismissible" id="correcto">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;El Código<strong style="color:#e8e8e8"> '.$codigo_trabajador.' </strong>ya esta registrado...
      </div>';
    return false;
  }else{
		$sql2 = $db->query("SELECT persona.DNI FROM persona WHERE persona.DNI = '$dni_trabajador' LIMIT 1 ");
		if ($db->rows($sql2) > 0) {
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;El DNI<strong style="color:#e8e8e8"> '.$dni_trabajador.' </strong>ya esta registrado...
				</div>';
			return false;
		}else{
			//echo  "se insetaron los datos";
			return true;
		}

	}
	$db->liberar();
	$db->close();
}


if (verificar_datos($email_trabajador,$dni_trabajador,$codigo_trabajador)) {
	//echo "toodo correcto";
	$verificar =$_FILES["imagen_trabajador"]['name'];
	if (!empty($verificar)){
	$valor = true;
	$nombre =uniqid()."-".$_FILES['imagen_trabajador']['name']; //archivo que subi
	$tipo = $_FILES['imagen_trabajador']['type']; // tipo de archivo
	$ruta_imagen = $_FILES['imagen_trabajador']['tmp_name']; //donde esta almacenado el archivo
	$tamano = $_FILES['imagen_trabajador']['size']; //tamaño del archivo

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
				//echo "no enviaste una imagen";

		}

}else{
	echo "errorrrr";
	$valor = false;
}


////envio 
if ($valor) {
	//procedemos a instanciar la clase Alumno
	$instancia = new Trabajador();
	$consulta = $instancia->registro_trabajador($email_trabajador,$dni_trabajador,$nacimiento_trabajador,$fecha_actual,$nombre_trabajador,$nombre_usuario,
	$apep_trabajador,$apem_trabajador,$domicilio_trabajador,$telefono_trabajador,$sexo_trabajador,$password_trabajador,$ruta_registro,$codigo_trabajador,
	$estado_trabajador,$tipo_usuario);
	echo $consulta;
}else{
	//echo "ocurrio un error en el controlador";
}




 ?>
