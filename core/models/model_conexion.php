
<?php

#constantes de conexion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','repositorio01');


class Conexion2 extends mysqli{
  public function __construct(){
    parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $this->connect_errno ? die('ERROR EN LA CONEXION A LA DB') : null;
    $this->set_charset("utf8");

  }
  public function rows($query){
    return mysqli_num_rows($query);
  }

  public function liberar($query){
    return mysqli_free_result($query);
  }

  public function recorrer($query){
    return mysqli_fetch_array($query);
  }

}

 ?>
