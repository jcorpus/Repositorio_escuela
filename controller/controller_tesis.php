<?php

include "../core/models/model_conexion.php";
require ("../model/model_tesis.php");

$nombre_tesis = trim($_POST['nombre_tesis']);
$autor_tesis = trim($_POST['autor_tesis']);
$tipotesis_datos = $_POST['tipotesis_datos'];
$resumen_tesis = $_POST['resumen_tesis'];
$objetivos_tesis = $_POST['objetivos_tesis'];
$filial_datos = $_POST['filial_datos'];
$etiquetas_tesis = $_POST['etiquetas_tesis'];
$archivo_tesis = $_POST['archivo_tesis'];

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


function verificar_datos($nombre_tesis){
	$db = new Conexion2;
	$sql = $db->query("SELECT tesis.titulo FROM tesis WHERE tesis.titulo = '$nombre_tesis' LIMIT 1 ");

	if ($db->rows($sql) > 0) {
		echo '<div class="alert alert-danger alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;Ya se registro una tesis con ese Título<strong style="color:#e8e8e8"> '.$nombre_tesis.' </strong>ya esta registrado...
			</div>';
		return false;
	}else{
    return true;

	}
	$db->liberar();
	$db->close();
}


if (verificar_datos($titulo_tesis)) {
	//echo "toodo correcto";
	$verificar =$_FILES["archivo_tesis"]['name'];
	if (!empty($verificar)){
	$valor = false;
	$nombre =uniqid()."-".$_FILES['archivo_tesis']['name']; //archivo que subi
	$tipo = $_FILES['archivo_tesis']['type']; // tipo de archivo
	$ruta_tesis = $_FILES['archivo_tesis']['tmp_name']; //donde esta almacenado el archivo
	$tamano = $_FILES['archivo_tesis']['size']; //tamaño del archivo
	$limite_kb = 100;
  $permitidos = array('application/msword','application/pdf');
  $limite_bytes = 5242880; //10 MB
  //10MB = 10485760 Bytes
  //5MB = 5242880 Bytes
  //1MB == 1048576 bytes
  //1MB == 1024 Kbytes

		if (!in_array($tipo,$permitidos)) {
			echo '<div class="alert alert-danger alert-dismissible" id="">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;Archivo no permitido
				</div>';
				$valor = false;
			}else if($tamano > 5242880){
				echo '<div class="alert alert-danger alert-dismissible" id="">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fa fa-times"></i>&nbsp;El tamaño permitido es 5Mb
					</div>';
					$valor = false;
			}else{
				$ruta_copia = '../html/doc_server/'.$nombre;
				$ruta_registro = 'html/doc_server/'.$nombre;
				move_uploaded_file($ruta_tesis,$ruta_copia);
        $valor = true;
			}

		}
		else{
			echo "Envia una archivo";

		}

}else{
	echo "errorrrr";
}

//****************GENERAR CODIGO***************
function generarCodigo($longitud, $tipo=0){
    //creamos la variable codigo
    $codigo = "";
    //caracteres a ser utilizados
    $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    //el maximo de caracteres a usar
    $max=strlen($caracteres)-1;
    //creamos un for para generar el codigo aleatorio utilizando parametros min y max
    for($i=0;$i < $longitud;$i++){
        $codigo.=$caracteres[rand(0,$max)];
    }
    //regresamos codigo como valor
    return $codigo;
}


$codigo_tesis = generarCodigo(8);

if ($valor == true) {
  //procedemos a enviar
  $instancia = new Tesis();
  $consulta = $instancia->registro_tesis($nombre_tesis,$autor_tesis,$tipotesis_datos,$resumen_tesis,
  $objetivos_tesis,$filial_datos,$etiquetas_tesis,$archivo_tesis,$codigo_tesis,$tipo);
  echo $consulta;
}


 ?>
