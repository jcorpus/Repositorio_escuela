<?php

////EJEMPLO
//http://www.apoyoti.com/clase-simple-en-php-para-conexion-a-base-de-datos-mysql/

class Usuario {
  private $db;
  public function __construct(){
  require_once('../core/models/model_conexion.php');
  $this->db = new Conexion2();
}


function registro_user($nombre_user,$dni_user,$apep_user,$apem_user,$domicilio_user,$telefono_user,$edad_user,
$email_user,$sexo_user,$password_user,$nacimiento_user,$ruta_registro){
  $consulta = "INSERT INTO persona(nombre,ape_paterno,ape_materno,dni,domicilio,telefono,email,
    sexo,fecha_nacimiento, edad)
    VALUES('$nombre_user','$apep_user','$apem_user','$dni_user','$domicilio_user',
    '$telefono_user','$email_user','$sexo_user','$nacimiento_user','$edad_user')";
  $consulta2 = "INSERT INTO usuarios(id_persona,usuario,password,img_usuario)
      VALUES(LAST_INSERT_ID(),'$nombre_user','$password_user','$ruta_registro')";

  if ($this->db->query($consulta)) {
      $this->db->query($consulta2);
    return 1;
  }else{
    return 0;
  }
  $this->db->close();

}

function editar_user($nombre_user,$apep_user,$apem_user){

  $sql = $this->db->query("SELECT nombre FROM prueba WHERE nombre='$nombre_user' LIMIT 1; ");
  if ($this->db->rows($sql) == 0) {
    $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
      VALUES('$nombre_user','$apep_user','$apem_user')";
    $this->db->query($consulta);
    $this->db->close();
    $respuesta = "usuario registrado correctamente";
    echo $respuesta;

  }else{
    $usuario = $this->db->recorrer($sql)[0];
    if (strtolower($nombre_user) == strtolower($usuario)) {
      $respuesta = "EL USUARIO YA EXISTE LOL";
      echo  $respuesta;
    }
  }

/*
  $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
    VALUES('$nombre_user','$apep_user','$apem_user')";
  $this->db->query($consulta);
  $this->db->close();
*/
}

function listar_user(){



}

function borrar_user(){



}

}
/*
$instancia = new Usuario();
if ($instancia->registro_user('julio','45456756','corpus','mechato','ppao','456464','12','julio@gmal.com','m','julio','2015/12/12','prueba.png')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}
*/
/*

$instancia = new Usuario();

$var = $instancia->editar_user('julioo','corpus','mechato');
*/

 ?>
