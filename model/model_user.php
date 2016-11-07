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
  $consulta = "INSERT INTO prueba(nombre,ape_paterno,ape_materno)
    VALUES('$nombre_user','$apep_user','$apem_user')";
  $this->db->query($consulta);
  $this->db->close();



}

function listar_user(){



}

function borrar_user(){



}




}

$instancia = new usuario();

$var = $instancia->editar_user('julio','corpus','mechato');


 ?>
