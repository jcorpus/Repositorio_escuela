<?php 

include "../core/models/model_conexion.php";
require ("../model/model_alumno.php");


$id_alumno = $_POST['id_alumno2'];
$nom_alumno = $_POST['nombre_alumno2'];
$apep_alumno = $_POST['ape_paterno2'];
$apem_alumno = $_POST['ape_materno2'];
$direccion_alumno = $_POST['domicilio_alumno2'];
$dni_alumno = $_POST['dni_alumno2'];
$telefono_alumno = $_POST['telefono_alumno2'];
$email_alumno = $_POST['email_alumno2'];
$codigo_alumno = $_POST['codigo_alumno2'];
//$imagen_alumno = $_POST['imagen_alumno2'];


function verificar_datos($email_alumno,$dni_alumno,$codigo_alumno){
	$db = new Conexion2;
	$sql = $db->query("SELECT persona.Email FROM persona WHERE persona.Email = '$email_alumno' LIMIT 1 ");
  $sql3 = $db->query("SELECT a.UspCodAlu FROM alumno a WHERE  a.UspCodAlu = '$codigo_alumno' LIMIT 1 ");
	if ($db->rows($sql) > 0) {
		echo '<div class="alert alert-danger alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;El email<strong style="color:#e8e8e8"> '.$email_alumno.' </strong>ya esta registrado...
			</div>';
		return false;
	}else if($db->rows($sql3) > 0){
    echo '<div class="alert alert-danger alert-dismissible" id="correcto">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fa fa-times"></i>&nbsp;El Código<strong style="color:#e8e8e8"> '.$codigo_alumno.' </strong>ya esta registrado...
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
	//$db->liberar();
	$db->close();
}


if (verificar_datos($email_alumno,$dni_alumno,$codigo_alumno)) {
	//echo "toodo correcto";
	$verificar =$_FILES["imagen_alumno2"]['name'];
	if (!empty($verificar)){
	$valor = true;
	$nombre =uniqid()."-".$_FILES['imagen_alumno2']['name']; //archivo que subi
	$tipo = $_FILES['imagen_alumno2']['type']; // tipo de archivo
	$ruta_imagen = $_FILES['imagen_alumno2']['tmp_name']; //donde esta almacenado el archivo
	$tamano = $_FILES['imagen_alumno2']['size']; //tamaño del archivo

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
					<i class="icon fa fa-times"></i>&nbsp;el tamaño máximo permitido es 5 Mb
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
					
				$ruta_registro = $_POST['imagen_oculta'];
				$valor = true;
				echo "la misma imagen";

		}

}else{
	echo "error mod alumno";
	$valor = false;
}

/****** enviando  ****/
if ($valor) {
	$instancia = new Alumno();
	$consulta = $instancia->modificar_alumno($id_alumno,$nom_alumno,$apep_alumno,$apem_alumno,$direccion_alumno,$dni_alumno,$telefono_alumno,$email_alumno,$codigo_alumno,$ruta_registro);
	echo $consulta;
}else{
	echo "ocurrio un error en el controlador";
}







 ?>