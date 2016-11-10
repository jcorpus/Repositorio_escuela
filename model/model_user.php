<?php



////EJEMPLO
//http://www.apoyoti.com/clase-simple-en-php-para-conexion-a-base-de-datos-mysql/

class usuario {
  private $db;
  public function __construct(){
  require_once('../core/models/model_conexion.php');
  $this->db = new Conexion2();
}


function registro_user($datos_user=array()){
  $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
    VALUES('$nombre_user','$apep_user','$apem_user')";
  $db->query($consulta);
  $db->close();





}

function editar_user($nombre_user,$apep_user,$apem_user){

  $sql = $this->db->query("SELECT nombre FROM prueba WHERE nombre='$nombre_user' LIMIT 1; ");
  if ($this->db->rows($sql) == 0) {
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

$instancia = new usuario();

$var = $instancia->editar_user('julioo','corpus','mechato');


 ?>
