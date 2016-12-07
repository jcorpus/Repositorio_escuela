<?php

//require('../core/models/model_conexion.php');
require ("../model/model_tesis.php");
require("../core/bin/funciones/get_size_archivo.php");

$nombre_tesis = trim($_POST['nombre_tesis']);
$autor_tesis = trim($_POST['autor_tesis']);
$tipotesis_datos = $_POST['tipotesis_datos'];
$cita_tesis = $_POST['cita_tesis'];
$resumen_tesis = $_POST['resumen_tesis'];
//$objetivos_tesis = $_POST['objetivos_tesis'];  ///pude ser
$filial_datos = $_POST['filial_datos'];
$pclaves = $_POST['pclaves_tesis']; 
$grado_academico = $_POST['grado_academico']; 
$categoria_tesis = $_POST['categoria_tesis']; 
$estado_tesis = $_POST['estado_tesis'];

/**************************/
date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_usuario = $_POST['id_usuario_t'];


$instancia = new Tesis();
$comprobar = $instancia->verificar_datos_tesis($nombre_tesis);
if ($comprobar == false) {
	echo '<div class="alert alert-danger alert-dismissible" id="correcto">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fa fa-times"></i>&nbsp;Ya se registro una tesis con el Título<strong style="color:#e8e8e8"> '.$nombre_tesis.' </strong>...
		</div>';
		$comodin = false;
}else{
	$comodin = true;
}


if ($comodin == true) {
	//echo "toodo correcto";
	$verificar =$_FILES["archivo_tesis"]['name'];
	if (!empty($verificar)){
	$valor = false;
	$nombre =uniqid()."-".$_FILES['archivo_tesis']['name']; //archivo que subi
	$tipo = $_FILES['archivo_tesis']['type']; // tipo de archivo
	$ruta_tesis = $_FILES['archivo_tesis']['tmp_name']; //donde esta almacenado el archivo
	$tamano2 = $_FILES['archivo_tesis']['size']; //tamaño del archivo
	$tamano = convertir_size_file($tamano2);
		
	$limite_kb = 100;
  $permitidos = array('application/msword','application/pdf');
	//application/vnd.openxmlformats-officedocument.wordprocessingml.document
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
			}else if($tamano2 > 5242880){
				echo '<div class="alert alert-danger alert-dismissible" id="">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fa fa-times"></i>&nbsp;El tamaño permitido es 5 Mb
					</div>';
					$valor = false;
			}else{
				//iconv("UTF-8",'ISO-8859-1//TRANSLIT',$nombre)
				//$ruta_copia = '../html/doc_server/'.$nombre;
				$ruta_copia = '../html/doc_server/'.iconv("UTF-8",'ISO-8859-1//TRANSLIT',$nombre);
				$ruta_registro = 'html/doc_server/'.$nombre;
				move_uploaded_file($ruta_tesis,$ruta_copia);
        $valor = true;
			}

		}
		else{
			echo '<div class="alert alert-danger alert-dismissible" id="">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;Debes de enviar un Archivo
				</div>';
			$valor = false;
		}

}else{
	echo "errorrrr";
	$valor = false;
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
	
		$consulta = $instancia->registro_tesis($codigo_tesis ,$nombre_tesis,$autor_tesis,$pclaves,$fecha_registro,$cita_tesis,$resumen_tesis,$tipotesis_datos,
		$filial_datos,$grado_academico,$id_usuario,$categoria_tesis,$estado_tesis,$ruta_registro,$tipo,$tamano);
		echo $consulta;
		
	
	/*

	*/
}


 ?>
